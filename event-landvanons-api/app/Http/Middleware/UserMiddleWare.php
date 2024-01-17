<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->roles == 'admin') {
                return $next($request);

            } else {
                return redirect('/home')->with('message', 'Access denied as you are not admin');
            }
        } else {
            return redirect('/login')->with('message', 'Login in to access Ticket system portal ');
        }

        return $next($request);
    }
}

