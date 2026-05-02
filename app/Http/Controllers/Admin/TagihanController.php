<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penggunaan;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

/**
 * Controller untuk mengelola data tagihan listrik pelanggan.
 */
class TagihanController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
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

    /**
     * Menampilkan daftar tagihan.
     *
     * Mendukung pencarian berdasarkan bulan, tahun, dan status.
     *
     * @queryParam q string Opsional. Kata kunci pencarian.
     *
     * @return \Inertia\Response
     */
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

    /**
     * Menampilkan form pembuatan tagihan.
     *
     * Hanya menampilkan data penggunaan yang belum memiliki tagihan.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $penggunaan = Penggunaan::with('pelanggan')->doesntHave('tagihan')->get();
        return Inertia::render('Admin/Tagihan/Create', compact('penggunaan'));
    }

    /**
     * Menyimpan data tagihan baru.
     *
     * Sistem akan otomatis menghitung:
     * - jumlah meter (meter_akhir - meter_awal)
     * - jumlah biaya berdasarkan tarif pelanggan
     *
     * @param Request $request
     *
     * @bodyParam penggunaan_id integer required ID penggunaan.
     * @bodyParam status string required Status tagihan (paid/unpaid/pending).
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Menampilkan form edit tagihan.
     *
     * @param Tagihan $tagihan
     *
     * @return \Inertia\Response
     */
    public function edit(Tagihan $tagihan)
    {
        return Inertia::render('Admin/Tagihan/Edit', compact('tagihan'));
    }

    /**
     * Memperbarui data tagihan.
     *
     * Hanya memperbarui status tagihan.
     *
     * @param Request $request
     * @param Tagihan $tagihan
     *
     * @bodyParam status string required Status terbaru.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Menghapus data tagihan.
     *
     * @param Tagihan $tagihan
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan deleted successfully.');
    }
}
