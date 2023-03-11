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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $resource_id = request()->route('user')?->id;

        $user = auth()->user();
        
        if ($user->is_admin) {
            return $next($request);
        }

        if ($user->id !== $resource_id) { // Check user ownership
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}
