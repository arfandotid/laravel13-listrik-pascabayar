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

/**
 * Controller untuk mengelola data penggunaan listrik pelanggan.
 */
class PenggunaanController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:penggunaan.index'], only: ['index']),
            new Middleware(['permission:penggunaan.create'], only: ['create', 'store']),
            new Middleware(['permission:penggunaan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:penggunaan.delete'], only: ['destroy']),
        ];
    }
    /**
     * Menampilkan daftar penggunaan.
     *
     * Mendukung pencarian berdasarkan bulan dan tahun serta pagination.
     *
     * @queryParam q string Opsional. Kata kunci pencarian.
     *
     * @return \Inertia\Response
     */
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

    /**
     * Menampilkan form pembuatan penggunaan.
     *
     * Mengirim daftar pelanggan untuk dipilih.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::select('id', 'nama', 'no_kwh')->get();
        return Inertia::render('Admin/Penggunaan/Create', compact('pelanggan'));
    }

    /**
     * Menyimpan data penggunaan baru.
     *
     * Sekaligus membuat tagihan secara otomatis dalam satu transaksi database.
     *
     * @param Request $request
     *
     * @bodyParam pelanggan_id integer required ID pelanggan.
     * @bodyParam bulan string required Bulan penggunaan.
     * @bodyParam tahun string required Tahun penggunaan.
     * @bodyParam meter_awal integer required Meter awal.
     * @bodyParam meter_akhir integer required Meter akhir.
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * Menampilkan form edit penggunaan.
     *
     * @param Penggunaan $penggunaan
     *
     * @return \Inertia\Response
     */
    public function edit(Penggunaan $penggunaan)
    {
        $pelanggan = Pelanggan::select('id', 'nama', 'no_kwh')->get();
        return Inertia::render('Admin/Penggunaan/Edit', compact('penggunaan', 'pelanggan'));
    }

    /**
     * Memperbarui data penggunaan.
     *
     * @param Request $request
     * @param Penggunaan $penggunaan
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * Menghapus data penggunaan.
     *
     * @param Penggunaan $penggunaan
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Penggunaan $penggunaan)
    {
        $penggunaan->delete();

        return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan deleted successfully.');
    }
}
