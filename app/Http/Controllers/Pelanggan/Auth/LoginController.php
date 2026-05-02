<?php

namespace App\Http\Controllers\Pelanggan\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    // Menampilkan halaman login untuk pelanggan.
    public function index()
    {
        return Inertia::render('Pelanggan/Auth/Login');
    }

    // Memproses login pelanggan dengan validasi input dan autentikasi menggunakan guard 'pelanggan'.
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

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Email / Username atau password salah.',
        ]);
    }

    // Memproses logout pelanggan dengan menghapus sesi dan token CSRF, kemudian mengarahkan kembali ke halaman login.
    public function logout(Request $request)
    {
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login');
    }
}
