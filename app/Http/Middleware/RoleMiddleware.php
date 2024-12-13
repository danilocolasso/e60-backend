<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = ''): Response
    {
        if (!Auth::check()) {
            return response()->json(
                Response::$statusTexts[Response::HTTP_UNAUTHORIZED],
                Response::HTTP_UNAUTHORIZED
            );
        }

        if (!Auth::user()->role->contains($role)) {
            return response()->json(
                Response::$statusTexts[Response::HTTP_FORBIDDEN],
                Response::HTTP_FORBIDDEN
            );
        }

        return $next($request);
    }
}
