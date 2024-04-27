<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateContact
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'name' => 'required|string|min:5|max:250',
            'email' => 'required|string|min:5|max:300|ends_with:gmail.com',
            'phone' => 'required|numeric|max:9999999999',
            'message' => 'required|min:5|string|max:1000',
        ]);
        return $next($request);
    }
}
