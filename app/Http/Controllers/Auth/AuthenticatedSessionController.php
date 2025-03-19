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
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Regenerasi session
        $request->session()->regenerate();

        // Ambil URL yang dimaksud sebelum login (jika ada)
        $intendedUrl = session()->pull('url.intended', route('dashboard'));

        // Redirect ke URL yang dimaksud
        return redirect()->to($intendedUrl);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Logout pengguna
        Auth::guard('penduduk')->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }
}