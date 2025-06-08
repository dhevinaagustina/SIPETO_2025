<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsMahasiswaAktif
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('mahasiswa')->user();

        if (!$user || $user->status !== 'aktif') {
            return redirect('/dashboard/beranda')->with('error', 'Hanya untuk mahasiswa aktif.');
        }

        return $next($request);
    }
}
