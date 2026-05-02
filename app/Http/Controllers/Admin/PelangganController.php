<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

/**
 * Controller untuk mengelola data pelanggan.
 */
class PelangganController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:pelanggan.index'], only: ['index']),
            new Middleware(['permission:pelanggan.create'], only: ['create', 'store']),
            new Middleware(['permission:pelanggan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:pelanggan.delete'], only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar pelanggan.
     *
     * Menyediakan data pelanggan dengan fitur:
     * - Pencarian berdasarkan nama, email, atau nomor KWH
     * - Pagination
     *
     * @queryParam q string Opsional. Kata kunci pencarian.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::query()
            ->with('tarif')
            ->when(request()->q, function ($q) {
                $q->where('nama', 'like', '%' . request()->q . '%')
                    ->orWhere('email', 'like', '%' . request()->q . '%')
                    ->orWhere('no_kwh', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $pelanggan->appends(['q' => request()->q]);

        return Inertia::render('Admin/Pelanggan/Index', compact('pelanggan'));
    }

    /**
     * Menampilkan form untuk membuat pelanggan baru.
     * 
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Pelanggan/Create');
    }

    /**
     * Menyimpan data pelanggan baru.
     *
     * @param Request $request
     *
     * @bodyParam nama string required Nama pelanggan.
     * @bodyParam email string required Email pelanggan.
     * @bodyParam username string required Username akun.
     * @bodyParam password string required Minimal 8 karakter.
     * @bodyParam no_kwh string required Nomor KWH.
     * @bodyParam alamat string required Alamat pelanggan.
     * @bodyParam tarif_id integer required ID tarif.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8',
            'no_kwh' => 'required',
            'alamat' => 'required',
            'tarif_id' => 'required',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'no_kwh' => $request->no_kwh,
            'alamat' => $request->alamat,
            'tarif_id' => $request->tarif_id,
        ]);

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit pelanggan yang sudah ada.
     * 
     * @param Pelanggan $pelanggan
     *
     * @return \Inertia\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return Inertia::render('Admin/Pelanggan/Edit', compact('pelanggan'));
    }

    /**
     * Memperbarui data pelanggan.
     *
     * Jika password tidak diisi, maka password lama tetap digunakan.
     *
     * @param Request $request
     * @param Pelanggan $pelanggan
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'nullable|string|min:8',
            'no_kwh' => 'required',
            'alamat' => 'required',
            'tarif_id' => 'required',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $pelanggan->password,
            'no_kwh' => $request->no_kwh,
            'alamat' => $request->alamat,
            'tarif_id' => $request->tarif_id,
        ]);

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan updated successfully.');
    }

    /**
     * Menghapus data pelanggan.
     *
     * @param Pelanggan $pelanggan
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan deleted successfully.');
    }
}
