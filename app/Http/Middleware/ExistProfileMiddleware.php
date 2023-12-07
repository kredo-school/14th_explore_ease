<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserTypeEnum;

class ExistProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 全てのリクエストを処理する
        // Auth::check() - loginしていればtrue
        if (Auth::check()) {
            if (Auth::user()->profile == null) {
                // profileがなかったらhomeページに遷移する
                return redirect()->route('home');
            }
        }

        return $next($request);
    }
}
