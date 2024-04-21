<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ValidateOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'full_name' => 'required|min:5|max:150|string',
            'email' => [
                'required',
                'ends_with:gmail.com',
                'email',
                Rule::unique('users')->ignore(Auth::id())
            ],
            'address' => 'required|string|min:10',
            'city' => 'required|string',
            'phone_number' => 'required|min:10|max:13'
        ]);

        return $next($request);
    }
}
