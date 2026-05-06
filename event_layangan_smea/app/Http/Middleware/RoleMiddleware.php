<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        // Cek sudah login atau belum
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        // Cek role cocok
        if ($user->role !== $role) {
            // Redirect ke dashboard sesuai role masing-masing
            return match($user->role) {
                'admin'  => redirect()->route('admin.dashboard')
                                ->with('error', 'Akses ditolak.'),
                'juri'   => redirect()->route('juri.dashboard')
                                ->with('error', 'Akses ditolak.'),
                'peserta'=> redirect()->route('peserta.dashboard')
                                ->with('error', 'Akses ditolak.'),
                default  => redirect()->route('login'),
            };
        }

        return $next($request);
    }
}