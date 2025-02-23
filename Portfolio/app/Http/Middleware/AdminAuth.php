<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('ADMIN_LOGIN')) {
            if (session()->has('password_changed_message')) {
                return redirect('admin')->with('success', session('password_changed_message'));
            } else {
                return redirect('admin')->with('error', 'Access Denied');
            }
        }
        return $next($request);
    }
}
