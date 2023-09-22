<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // $roleAlias = [
        //     'A' => 'a'
        // ]
        if ($request->user()) {
            if ($request->user()->role !== $role) {
                return abort(401, 'Tasds');
            }
        }
        if (!$request->user()) {
            return abort(401, 'Tasds');
        }

        return $next($request);
    }
}
