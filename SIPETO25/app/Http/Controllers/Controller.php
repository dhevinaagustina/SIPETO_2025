<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getUser()
    {
        foreach (['mahasiswa', 'dosen'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user();
            }
        }
        return null;
    }

    protected function getUserGuard()
    {
        foreach (['mahasiswa', 'dosen'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }
        return null;
    }

}
