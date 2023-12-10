<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in and has the role of 'admin'
        if ($request->user() && $request->user()->role !== 'admin') {
            // If the user doesn't have the 'admin' role, redirect them or perform actions accordingly
            return redirect()->route('unauthorized');
        }

        // If the user has the 'admin' role, allow them to proceed to the requested route
        return $next($request);
    }
}
