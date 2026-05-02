<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    /**
     * Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna. 
     * Setiap metode memiliki izin yang berbeda untuk memastikan keamanan dan kontrol akses yang tepat.
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:users.index'], only: ['index']),
            new Middleware(['permission:users.create'], only: ['create', 'store']),
            new Middleware(['permission:users.edit'], only: ['edit', 'update']),
            new Middleware(['permission:users.delete'], only: ['destroy']),
        ];
    }

    // Menampilkan daftar pengguna dengan fitur pencarian dan pagination.
    public function index()
    {
        $users = User::query()
            ->with('roles:id,name')
            ->when(request()->q, function ($users) {
                $users->where(function ($q) {
                    $q->where('name', 'like', '%' . request()->q . '%')
                        ->orWhere('email', 'like', '%' . request()->q . '%');
                });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $users->appends(['q' => request()->q]);

        return Inertia::render('Admin/Users/Index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru dengan daftar peran yang tersedia.
    public function create()
    {
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        return Inertia::render('Admin/Users/Create', compact('roles'));
    }

    // Menyimpan data pengguna baru ke database setelah validasi, termasuk mengaitkan peran yang dipilih.
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|min:8',
            'roles'    => 'required|array',
            'roles.*'  => 'exists:roles,id',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // assign role
        $user->syncRoles($request->roles);

        return redirect()->to('/admin/users')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit data pengguna yang sudah ada, termasuk daftar peran yang tersedia dan peran yang sudah terkait dengan pengguna tersebut.
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        $userRoles = $user->roles->pluck('id');

        return Inertia::render('Admin/Users/Edit', compact('user', 'roles', 'userRoles'));
    }

    // Memperbarui data pengguna yang sudah ada di database setelah validasi, termasuk memperbarui peran yang terkait dengan pengguna tersebut.
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'password' => 'nullable|min:8',
            'roles'    => 'required|array',
            'roles.*'  => 'exists:roles,id',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
        ]);

        // update password jika diisi
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // sync role
        $user->syncRoles($request->roles);

        return redirect()->to('/admin/users')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna dari database.
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->to('/admin/users')->with('success', 'User deleted successfully.');
    }
}
