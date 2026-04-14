<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = getAuthUser();

        if(!$user->hasRole('Super Admin')) {
            
            return redirect()->route('home')->with(['message' => 'You are not authorized to access this page','type' => 'danger']);
        }

        return $next($request);
    }
}
