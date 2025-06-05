<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdminOnly
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('super_admin')->check()) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }

}
