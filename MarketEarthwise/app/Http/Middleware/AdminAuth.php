<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
        } else {
            $request->session()->flash('error', 'Access Denied');
            return redirect('admin');
        }
        return $next($request);
    }
}
