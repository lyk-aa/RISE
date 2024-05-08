<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole=Auth::user()->route; 

        if($userRole==5){
            return $next($request);
        }

        if($userRole==1){
            return redirect()->route('owner');
        }

        if($userRole==2){
            return redirect()->route('storemanager');
        }

        if($userRole==3){
            return redirect()->route('warehousemanager');
        }

        if($userRole==4){
            return redirect()->route('driver');
        }
    }
}
