<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckIfUserSeller
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role === 'Seller' || Auth::user()->role === 'Admin'){
            return back();
        } else {
            return $next($request);
        }
    }
}
