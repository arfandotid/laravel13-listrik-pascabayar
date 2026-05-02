<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PermissionController extends Controller implements HasMiddleware
{
    // Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna.
    public static function middleware()
    {
        return [
            new Middleware(['permission:permissions.index'], only: ['index']),
            new Middleware(['permission:permissions.create'], only: ['create', 'store']),
            new Middleware(['permission:permissions.edit'], only: ['edit', 'update']),
            new Middleware(['permission:permissions.delete'], only: ['destroy']),
        ];
    }

    // Menampilkan daftar permissions dengan fitur pencarian dan pagination.
    public function index()
    {
        $permissions = Permission::query()
            ->when(request()->q, function ($permissions) {
                $permissions->where('name', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $permissions->appends(['q' => request()->q]);

        return Inertia::render('Admin/Permissions/Index', compact('permissions'));
    }

    // Menampilkan form untuk membuat permission baru.
    public function create()
    {
        return Inertia::render('Admin/Permissions/Create');
    }

    /**
     * Menyimpan data permission baru ke database setelah validasi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->to('/admin/permissions')->with('success', 'Permission created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit data permission yang sudah ada.
     */
    public function edit(Permission $permission)
    {
        return Inertia::render('Admin/Permissions/Edit', compact('permission'));
    }

    /**
     * Memperbarui data permission yang sudah ada di database setelah validasi.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->to('/admin/permissions')->with('success', 'Permission updated successfully.');
    }

    /**
     * Menghapus permission dari database.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->to('/admin/permissions')->with('success', 'Permission deleted successfully.');
    }
}
