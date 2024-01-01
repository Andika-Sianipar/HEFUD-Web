<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function handle($request, Closure $next, $role)
    // {
    //     if (Auth::check() && Auth::user()->role === $role) {
    //         return $next($request);
    //     }

    //     return redirect('/')->with('error', 'Unauthorized.');
    // }
    public function handle($request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Periksa apakah pengguna memiliki peran yang diizinkan
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        // Jika tidak terautentikasi atau tidak memiliki peran yang diizinkan, kembalikan ke halaman yang sesuai
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
