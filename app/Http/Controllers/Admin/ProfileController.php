<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Admin/Profile/Index', compact('user'));
    }

    /**
     * Memperbarui informasi profil pengguna.
     */
    public function update(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'username' => 'required|string|max:255|unique:users,username,' . $userId,
        ]);

        $user = User::findOrFail($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->to('/admin/profile')->with('error', 'Failed to update profile: ' . $e->getMessage());
        }

        return redirect()->to('/admin/profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Menampilkan halaman untuk mengubah password pengguna.
     */
    public function changePassword()
    {
        return Inertia::render('Admin/Profile/ChangePassword');
    }

    /**
     * Memperbarui password pengguna setelah validasi.
     */
    public function updatePassword(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'current_password'  => 'required|string',
            'password'          => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($userId);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->to('/admin/profile/password')
                ->withErrors(
                    ['current_password' => 'Current password is incorrect.']
                );
        }

        if (Hash::check($request->password, $user->password)) {
            return redirect()->to('/admin/profile/password')
                ->withErrors(
                    ['password' => 'New password must be different from current password.']
                );
        }

        $user->password = bcrypt($request->password);

        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->to('/admin/profile/password')->with('error', 'Failed to update password: ' . $e->getMessage());
        }

        return redirect()->to('/admin/profile/password')->with('success', 'Password updated successfully.');
    }
}
