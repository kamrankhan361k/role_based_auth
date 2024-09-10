<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated and has the required role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // If not, redirect to home or an unauthorized page
        return redirect('/unauthorized');
    }
}
