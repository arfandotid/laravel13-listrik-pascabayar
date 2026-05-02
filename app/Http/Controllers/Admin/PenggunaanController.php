<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\DB;

class PenggunaanController extends Controller implements HasMiddleware
{
    // Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna.
    public static function middleware()
    {
        return [
            new Middleware(['permission:penggunaan.index'], only: ['index']),
            new Middleware(['permission:penggunaan.create'], only: ['create', 'store']),
            new Middleware(['permission:penggunaan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:penggunaan.delete'], only: ['destroy']),
        ];
    }

    // Menampilkan daftar penggunaan dengan fitur pencarian dan pagination.
    public function index()
    {
        $penggunaan = Penggunaan::query()
            ->with('pelanggan')
            ->when(request()->q, function ($q) {
                $q->where('bulan', 'like', '%' . request()->q . '%')
                    ->orWhere('tahun', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $penggunaan->appends(['q' => request()->q]);

        return Inertia::render('Admin/Penggunaan/Index', compact('penggunaan'));
    }

    // Menampilkan form untuk membuat penggunaan baru dengan daftar pelanggan yang tersedia.
    public function create()
    {
        $pelanggan = Pelanggan::select('id', 'nama', 'no_kwh')->get();
        return Inertia::render('Admin/Penggunaan/Create', compact('pelanggan'));
    }

    /**
     * Menyimpan data penggunaan baru ke database setelah validasi.
     * Proses ini juga membuat tagihan terkait secara otomatis dalam satu transaksi untuk memastikan konsistensi data.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        // Menggunakan transaksi untuk memastikan bahwa pembuatan penggunaan dan tagihan terkait berjalan atomik.
        try {
            DB::transaction(function () use ($request) {
                $penggunaan = Penggunaan::create([
                    'pelanggan_id' => $request->pelanggan_id,
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'meter_awal' => $request->meter_awal,
                    'meter_akhir' => $request->meter_akhir,
                ]);

                $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);
                $tarif = $pelanggan->tarif->tarifperkwh;
                $jumlah_biaya = ($penggunaan->meter_akhir - $penggunaan->meter_awal) * $tarif;

                Tagihan::create([
                    'penggunaan_id' => $penggunaan->id,
                    'pelanggan_id' => $request->pelanggan_id,
                    'bulan' => $request->bulan,
                    'tahun' => $request->tahun,
                    'jumlah_meter' => $request->meter_akhir - $request->meter_awal,
                    'jumlah_biaya' => $jumlah_biaya,
                    'status' => 'unpaid',
                ]);
            });

            return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan form untuk mengedit data penggunaan yang sudah ada.
     */
    public function edit(Penggunaan $penggunaan)
    {
        $pelanggan = Pelanggan::select('id', 'nama', 'no_kwh')->get();
        return Inertia::render('Admin/Penggunaan/Edit', compact('penggunaan', 'pelanggan'));
    }

    /**
     * Memperbarui data penggunaan yang sudah ada di database setelah validasi.
     */
    public function update(Request $request, Penggunaan $penggunaan)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        $penggunaan->update([
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan updated successfully.');
    }

    /**
     * Menghapus penggunaan dari database.
     */
    public function destroy(Penggunaan $penggunaan)
    {
        $penggunaan->delete();

        return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan deleted successfully.');
    }
}
