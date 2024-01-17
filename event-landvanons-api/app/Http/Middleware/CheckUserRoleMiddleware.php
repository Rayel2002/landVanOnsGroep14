<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->roles == 'visitor') {
                return $next($request);

            } elseif (Auth::user()->roles == 'admin');
            else {
                return redirect('/home')->with('message', 'Access denied as you are not admin');
            }
        } else {
            return redirect('/login')->with('message', 'Login in to access event page ');
        }

        return $next($request);
    }
}

