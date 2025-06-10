<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if ($user && $user->role == 1) { // Check if the user exists and has the role of admin
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
