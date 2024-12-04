<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // Jika belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Jika level user sesuai, lanjutkan request
        if ($user->level === $roles) {
            return $next($request);
        }

        // Jika tidak sesuai, arahkan ke halaman yang sesuai (contoh: 403 Forbidden)
        return abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}