<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APIKEY
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('APP_KEY');
        $key = '$2y$10$RdUKC5lhOM1ZIwevhCw6OO2Cks4RrvRQVWnAH.88JFKsHuPv.JNIq';
        if(Hash::check($token, $key)):
            return response()->json(['message'=>'APP KEY TIDAK DITEMUKAN'],401);
        endif;
        
        return $next($request);
    }
}
