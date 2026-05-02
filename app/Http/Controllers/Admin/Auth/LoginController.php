<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/**
 * Controller untuk autentikasi admin (login & logout).
 */
class LoginController extends Controller
{
    /**
     * Menampilkan halaman login admin.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    /**
     * Memproses login admin.
     *
     * Mendukung login menggunakan:
     * - email
     * - username
     *
     * @param Request $request
     *
     * @bodyParam login string required Email atau username.
     * @bodyParam password string required Password pengguna.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'login'     => 'required',
            'password'  => 'required',
        ]);

        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field     => $login,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/admin/dashboard');
        }

        return back()->withErrors([
            'login' => 'Email / Username atau password salah.',
        ]);
    }

    /**
     * Memproses logout admin.
     *
     * Menghapus session dan token keamanan.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/admin/login');
    }
}
