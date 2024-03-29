<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\HasApiTokens;

class AdminApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(auth()->user()->role_as == '1'){
                return $next($request);
            }
            else {
                return response()->json([
                    'message' => 'Access Denied !! as you are not an Admin',
                ], 403);
            }
        }
        else {
            return response()->json([
                'status' => 401,
                'message' => 'Please Login first',
            ]);
        }

    }
}
