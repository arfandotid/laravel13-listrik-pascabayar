<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

/**
 * Controller untuk manajemen permission (hak akses).
 */
class PermissionController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:permissions.index'], only: ['index']),
            new Middleware(['permission:permissions.create'], only: ['create', 'store']),
            new Middleware(['permission:permissions.edit'], only: ['edit', 'update']),
            new Middleware(['permission:permissions.delete'], only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar permission.
     *
     * Mendukung pencarian dan pagination.
     *
     * @queryParam q string Opsional. Nama permission.
     *
     * @return \Inertia\Response
     */
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

    /**
     * Menampilkan form pembuatan permission.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Permissions/Create');
    }

    /**
     * Menyimpan permission baru.
     *
     * @param Request $request
     *
     * @bodyParam name string required Nama permission (unik).
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * Menampilkan form edit permission.
     *
     * @param Permission $permission
     *
     * @return \Inertia\Response
     */
    public function edit(Permission $permission)
    {
        return Inertia::render('Admin/Permissions/Edit', compact('permission'));
    }

    /**
     * Memperbarui permission.
     *
     * @param Request $request
     * @param Permission $permission
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * Menghapus permission.
     *
     * @param Permission $permission
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->to('/admin/permissions')->with('success', 'Permission deleted successfully.');
    }
}
