<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMahasiswaOrDosen
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('mahasiswa')->check()) {
            Auth::shouldUse('mahasiswa'); // ⬅️ Force guard to mahasiswa
            return $next($request);
        }

        if (Auth::guard('dosen')->check()) {
            Auth::shouldUse('dosen'); // ⬅️ Force guard to dosen
            return $next($request);
        }

        return redirect()->route('login'); // ⬅️ fallback
    }
}
