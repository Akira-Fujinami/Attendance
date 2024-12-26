<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return redirect()->route('login'); // 未認証ならログインページにリダイレクト
        }

        return $next($request);
    }
}
