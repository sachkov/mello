<?php

namespace App\Http\Middleware;

use App\Models\Employer;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\JWTGuard;

class Authenticate
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            throw new AuthenticationException;
        }

        /** @var JWTGuard $guard */
        $guard = $this->auth->guard($guard);
        $user  = $guard->user();

        return $next($request);
    }
}
