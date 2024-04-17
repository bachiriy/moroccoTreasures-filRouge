<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateCategory
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->hasAny(['name', 'description'])) {
            $request->validate([
                'name' => 'required|unique:categories|min:4|max:100',
                'description' => 'required|min:5|max:500'
            ]);
        }
        return $next($request);
    }
}
