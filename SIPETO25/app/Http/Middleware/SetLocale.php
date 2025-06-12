<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            Session::put('locale', $lang);
        }

        App::setLocale(Session::get('locale', config('app.locale')));

        return $next($request);
    }
}
