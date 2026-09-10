<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Melakukan autentikasi
        $request->authenticate();

        // Membuat session baru setelah login
        $request->session()->regenerate();

        // Mengarahkan admin ke dashboard
        return redirect()->intended(
            route('admin.dashboard', absolute: false)
        );
    }

    /**
     * Memproses logout pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout dari guard web
        Auth::guard('web')->logout();

        // Menghapus session
        $request->session()->invalidate();

        // Membuat token CSRF baru
        $request->session()->regenerateToken();

        // Kembali ke halaman buku tamu
        return redirect()->route('login');
    }
}