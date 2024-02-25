<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah pengguna masuk (auth)
        if (Auth::check()) {
            // Cek apakah peran pengguna sesuai dengan yang diizinkan
            if (in_array(Auth::user()->role, $roles)) {
                return $next($request);
            }
        }

        // Redirect atau berikan respons sesuai kebijakan akses yang diinginkan
        return redirect()->route('home')->
        with('error', 'Unauthorized. You do not have the necessary permissions.');
    }
}
