<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penggunaan;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TagihanController extends Controller implements HasMiddleware
{
    /**
     * Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna. 
     * Setiap metode memiliki izin yang berbeda untuk memastikan keamanan dan kontrol akses yang tepat.
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:tagihan.index'], only: ['index']),
            new Middleware(['permission:tagihan.create'], only: ['create', 'store']),
            new Middleware(['permission:tagihan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:tagihan.delete'], only: ['destroy']),
        ];
    }

    // Menampilkan daftar tagihan dengan fitur pencarian dan pagination.
    public function index()
    {
        $tagihan = Tagihan::query()
            ->with(['penggunaan', 'pelanggan'])
            ->when(request()->q, function ($q) {
                $q->where('bulan', 'like', '%' . request()->q . '%')
                    ->orWhere('tahun', 'like', '%' . request()->q . '%')
                    ->orWhere('status', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $tagihan->appends(['q' => request()->q]);

        return Inertia::render('Admin/Tagihan/Index', compact('tagihan'));
    }

    // Menampilkan form untuk membuat tagihan baru dengan daftar penggunaan yang belum memiliki tagihan terkait.
    public function create()
    {
        $penggunaan = Penggunaan::with('pelanggan')->doesntHave('tagihan')->get();
        return Inertia::render('Admin/Tagihan/Create', compact('penggunaan'));
    }

    // Menyimpan data tagihan baru ke database setelah validasi, termasuk menghitung jumlah biaya berdasarkan penggunaan dan tarif pelanggan terkait.
    public function store(Request $request)
    {
        $request->validate([
            'penggunaan_id' => 'required',
            'status' => 'required',
        ]);

        $penggunaan = Penggunaan::findOrFail($request->penggunaan_id)->with('pelanggan');
        $tarif = $penggunaan->pelanggan->tarif->tarifperkwh;
        $jumlah_biaya = ($penggunaan->meter_akhir - $penggunaan->meter_awal) * $tarif;

        Tagihan::create([
            'penggunaan_id' => $request->penggunaan_id,
            'pelanggan_id' => $penggunaan->pelanggan_id,
            'bulan' => $penggunaan->bulan,
            'tahun' => $penggunaan->tahun,
            'jumlah_meter' => $penggunaan->meter_akhir - $penggunaan->meter_awal,
            'jumlah_biaya' => $jumlah_biaya,
            'status' => $request->status,
        ]);

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan created successfully.');
    }

    // Menampilkan form untuk mengedit data tagihan yang sudah ada.
    public function edit(Tagihan $tagihan)
    {
        return Inertia::render('Admin/Tagihan/Edit', compact('tagihan'));
    }

    // Memperbarui data tagihan yang sudah ada di database setelah validasi, termasuk memperbarui status tagihan.
    public function update(Request $request, Tagihan $tagihan)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $tagihan->update([
            'status' => $request->status,
        ]);

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan updated successfully.');
    }

    // Menghapus tagihan dari database.
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan deleted successfully.');
    }
}
