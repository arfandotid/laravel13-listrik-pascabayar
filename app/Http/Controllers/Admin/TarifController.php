<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tarif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TarifController extends Controller implements HasMiddleware
{
    /**
     * Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna. 
     * Setiap metode memiliki izin yang berbeda untuk memastikan keamanan dan kontrol akses yang tepat.
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:tarif.index'], only: ['index']),
            new Middleware(['permission:tarif.create'], only: ['create', 'store']),
            new Middleware(['permission:tarif.edit'], only: ['edit', 'update']),
            new Middleware(['permission:tarif.delete'], only: ['destroy']),
        ];
    }

    // Menampilkan daftar tarif dengan fitur pencarian dan pagination.
    public function index()
    {
        $tarif = Tarif::query()
            ->when(request()->q, function ($tarif) {
                $tarif->where('daya', 'like', '%' . request()->q . '%')
                    ->orWhere('tarifperkwh', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $tarif->appends(['q' => request()->q]);

        return Inertia::render('Admin/Tarif/Index', compact('tarif'));
    }

    // Menampilkan form untuk membuat tarif baru.
    public function create()
    {
        return Inertia::render('Admin/Tarif/Create');
    }

    // Menyimpan data tarif baru ke database setelah validasi.
    public function store(Request $request)
    {
        $request->validate([
            'daya' => 'required|numeric',
            'tarifperkwh' => 'required|numeric',
        ]);

        Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->to('/admin/tarif')->with('success', 'Tarif created successfully.');
    }

    // Menampilkan form untuk mengedit data tarif yang sudah ada.
    public function edit(Tarif $tarif)
    {
        return Inertia::render('Admin/Tarif/Edit', compact('tarif'));
    }

    // Memperbarui data tarif yang sudah ada di database setelah validasi.
    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'daya' => 'required|numeric',
            'tarifperkwh' => 'required|numeric',
        ]);

        $tarif->update([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->to('/admin/tarif')->with('success', 'Tarif updated successfully.');
    }

    // Menghapus tarif dari database.
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return redirect()->to('/admin/tarif')->with('success', 'Tarif deleted successfully.');
    }
}
