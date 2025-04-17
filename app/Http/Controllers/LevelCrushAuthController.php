<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Lib\Auth\AuthClaim;
use App\Lib\Auth\AuthPlatform;
use App\Lib\Auth\DiscordAuthResult;
use App\Models\User;
use App\Models\UserPlatform;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class LevelCrushAuthController extends Controller
{
    public function auth(Request $request) : RedirectResponse
    {

        $server = config('services.levelcrush.auth.server');
        $token = bin2hex(random_bytes(32));

        $userRedirect = $request->query('userRedirect', config('app.url'));
        if(is_array($userRedirect)) {
            $userRedirect = $userRedirect[0]; // take only the first input
        }

        $appRedirect = sprintf('%s/auth/levelcrush/validate?token=%s',
            config('app.url'),
            rawurlencode($token)
        );

        $authUrl = sprintf("%s/platform/discord/login?token=%s&redirectUrl=%s&userRedirect=%s",
            $server,
            rawurlencode($token),
            rawurlencode($appRedirect),
            rawurlencode($userRedirect)
        );

        return redirect($authUrl, 307);
    }

    public function validate(Request $request): RedirectResponse {

        $token = $request->query('token','');
        if(empty($token)) {
            abort(403, 'No token found');
        }

        if(is_array($token)) {
            $token = $token[0];
        }

        $ticket = new AuthClaim($token, AuthPlatform::Discord);
        $authData = $ticket->claim();
        $authResult = new DiscordAuthResult($authData);

        if(empty(trim($authResult->id()))) {
            // no discord id found
            abort(403, 'Discord Entity Not Found');
        }

        if(empty(trim($authResult->email()))) {
            // no email associated.
            abort(403, 'Email not found');
        }

        // upsert into our current database
        UserPlatform::upsert([
            [
                'platform' => AuthPlatform::Discord->asString(),
                'user_id' => null, // first time inserting will **never** have a user
                'entity_id' => $authResult->id(),
                'email' => $authResult->email(),
                'metadata' => json_encode($authResult->raw)
            ],
        ], uniqueBy: ['entity_id', 'platform'], update: ['email','metadata']);

        // now find and load that platform
        $userPlatform = UserPlatform::where('platform', AuthPlatform::Discord->asString())
            ->where('entity_id', $authResult->id())
            ->firstOrFail();


        // check to see if the email in the auth result is being used
        $emailTaken = User::where('email', $authResult->email())->exists();

        // if we have no user tied to this platform, we need to link one
        $needLink = $userPlatform->user === null;

        if($needLink) {
            // no user tied to this user. Since this is a **primary** login.
            // we can expect one user to be tied to this at all time

            if($emailTaken) {
                // if somehow our email is already taken. Abort the request
                // @todo improve the ux of reporting this error to the user
                abort(403, "Email already taken for registration. Contact suppport");
            }

            $user = User::create([
                'email' => $authResult->email(),
                'name' => $authResult->globalName(),
                'password' => Hash::make(bin2hex(random_bytes(32))),
            ]);

            // update userPlatform model
            $userPlatform->user_id = $user->id;
            $userPlatform->save();

        } else {
            // update linked user
            $userPlatform->user->name = $authResult->globalName();

            // if email different change it assuming it's not already taken
            // otherwise just let it
            if($userPlatform->user->email != $authResult->email()) {
                if($emailTaken) {
                    abort(403,'Email already taken. Cannot update user. Contact support');
                }
                $userPlatform->user->email = $authResult->email();
            }
            $userPlatform->user->save();
        }

        // sign user in
        Auth::loginUsingId($userPlatform->user_id);

        // done redirect user backk to either our app url or wherever it was specified for their user redirect
        $authUserRedirect = $authResult->redirect();
        if(empty($authUserRedirect)) {
            $authUserRedirect = config('app.url');
        }

        return redirect($authUserRedirect, 307);
    }

}
