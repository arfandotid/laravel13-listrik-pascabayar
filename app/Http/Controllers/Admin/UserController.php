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

/**
 * Controller untuk manajemen pengguna (user) dan role.
 */
class UserController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
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

    /**
     * Menampilkan daftar pengguna.
     *
     * Mendukung pencarian berdasarkan nama dan email serta pagination.
     *
     * @queryParam q string Opsional. Kata kunci pencarian.
     *
     * @return \Inertia\Response
     */
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

    /**
     * Menampilkan form pembuatan pengguna.
     *
     * Mengirim daftar role yang tersedia.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        return Inertia::render('Admin/Users/Create', compact('roles'));
    }

    /**
     * Menyimpan data pengguna baru.
     *
     * Termasuk assign role ke pengguna.
     *
     * @param Request $request
     *
     * @bodyParam name string required Nama pengguna.
     * @bodyParam email string required Email unik.
     * @bodyParam username string required Username unik.
     * @bodyParam password string required Minimal 8 karakter.
     * @bodyParam roles array required Array ID role.
     * @bodyParam roles.* integer required ID role yang valid.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Menampilkan form edit pengguna.
     *
     * Mengirim:
     * - data user
     * - daftar role
     * - role yang sudah dimiliki user
     *
     * @param User $user
     *
     * @return \Inertia\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::select('id', 'name')->orderBy('name')->get();
        $userRoles = $user->roles->pluck('id');

        return Inertia::render('Admin/Users/Edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Memperbarui data pengguna.
     *
     * Jika password diisi, maka password akan diperbarui.
     * Role pengguna akan disinkronisasi ulang.
     *
     * @param Request $request
     * @param User $user
     *
     * @bodyParam name string required Nama pengguna.
     * @bodyParam email string required Email unik.
     * @bodyParam username string required Username unik.
     * @bodyParam password string Opsional Minimal 8 karakter.
     * @bodyParam roles array required Array ID role.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Menghapus data pengguna.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->to('/admin/users')->with('success', 'User deleted successfully.');
    }
}
