<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    // Menampilkan halaman login untuk admin.
    public function index()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    // Memproses login admin dengan validasi input dan autentikasi menggunakan guard default.
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

    // Memproses logout admin dengan menghapus sesi dan token CSRF, kemudian mengarahkan kembali ke halaman login.
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/admin/login');
    }
}
