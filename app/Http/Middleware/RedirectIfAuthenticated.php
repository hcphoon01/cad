<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = User::where('id', Auth::user()->id)->first();

            if ($user->hasRole('Applicant')) {
                return redirect()->route('application.status');
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
