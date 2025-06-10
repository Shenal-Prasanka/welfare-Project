<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        $user = Auth::user(); // Get the authenticated user
        if ($user && $user->role == 0) { // Check if the user exists and has the role of a regular user
            return $next($request);
        } else {
            Auth::logout();
            return redirect(url('login'));
        }
    } else {
        Auth::logout();
        return redirect(url('login'));
    }
}
}
