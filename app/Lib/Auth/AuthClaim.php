<?php declare(strict_types=1);

namespace App\Lib\Auth;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class AuthClaim
{
    private string $token;
    private AuthPlatform $platform;

    public function __construct(string $token, AuthPlatform $platform) {
        $this->token = mb_convert_encoding($token, 'UTF-8', 'UTF-8');
        $this->platform =  $platform;
    }

    /**
     * @throws ConnectionException
     */
    public function claim() : array {

        $response = Http::asJson()
            ->withUrlParameters([
                'server' => config('services.levelcrush.auth.server'),
                'platform' => $this->platform->asString()
            ])
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-KEY' => config('services.levelcrush.auth.secret'),
            ])
            ->withUserAgent(config('services.levelcrush.auth.agent'))
            ->withBody(json_encode(['token' => $this->token], JSON_FORCE_OBJECT))
            ->post('{+server}/platform/{platform}/claim');

        $data = json_decode($response->body(), true);
        return $data;

    }
}
