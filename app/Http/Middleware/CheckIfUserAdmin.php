<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUserAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect('/', )->with('error', 'Unauthorized action.');
        } else
            return $next($request);
    }
}
