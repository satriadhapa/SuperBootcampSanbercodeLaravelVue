<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role->name != 'owner') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}


