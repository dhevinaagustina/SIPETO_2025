<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAlumni
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('mahasiswa')->user();

        if (!$user || $user->status !== 'alumni') {
            return redirect('/dashboard/beranda')->with('error', 'Hanya untuk alumni.');
        }

        return $next($request);
    }
}