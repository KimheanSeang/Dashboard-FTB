<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckExpiredSession
{
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('expired')) {
            Auth::logout();
            return redirect('admin_login');
        }

        return $next($request);
    }
}
