<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->role === 'admin') {
        //     return $next($request);
        // }
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        // return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman admin');
        return $next($request);
    }
}