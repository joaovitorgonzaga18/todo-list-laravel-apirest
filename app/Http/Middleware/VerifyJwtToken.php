<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class VerifyJwtToken
{
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->check();
        } catch (JWTException $e) {
            return response()->json(['error' => 'Invalid Token'], 401);
        }

        return $next($request);
    }
}
