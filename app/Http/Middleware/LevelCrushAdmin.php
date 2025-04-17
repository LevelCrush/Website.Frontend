<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LevelCrushAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // make sure they are an admin
        $userRedirect = sprintf('/auth/levelcrush?userRedirect=%s', rawurlencode($request->fullUrl()));

        $metadata = session('metadata', []);
        if(empty($metadata)) {
            // no metadata? Login
            return redirect($userRedirect, 307);
        }

        if(empty($metadata['discord'])) {
            return redirect($userRedirect, 307);
        }

        $isAdmin = $metadata['discord']['isAdmin'] ?? false;
        if(!$isAdmin) {
            abort(403, 'Must be admin');
        }

        return $next($request);
    }
}
