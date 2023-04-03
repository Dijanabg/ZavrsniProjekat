<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role_as == '1'){
                return $next($request);
            }else{
                Alert::success('Pristup nije dozvoljen','');
                return redirect('/')->with('message', 'Acces denited');
            }
        }else{
            Alert::success('Ulogujte se da bi pristupili','');
            return redirect('/login')->with('message', 'Login to access');
        }
        // return $next($request);  
    }
    
}
