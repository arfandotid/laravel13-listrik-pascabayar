<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

/**
 * Controller untuk mengelola data tagihan.
 */
class TagihanController extends Controller
{
    // Menggunakan trait untuk menangani proses upload file dengan cara yang terstruktur dan dapat digunakan kembali di berbagai bagian aplikasi.
    use FileUploadTrait;

    /**
     * Menampilkan daftar tagihan untuk pelanggan yang sedang login dengan fitur pencarian dan pagination.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $pelanggan_id = Auth::guard('pelanggan')->user()->id;
        $tagihan = Tagihan::query()
            ->with(['pelanggan'])
            ->when(request()->q, function ($q) {
                $q->whereHas('pelanggan', function ($q) {
                    $q->where('nama', 'like', '%' . request()->q . '%');
                })->orWhere('bulan', 'like', '%' . request()->q . '%')
                    ->orWhere('tahun', 'like', '%' . request()->q . '%');
            })
            ->where('pelanggan_id', $pelanggan_id)
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        return Inertia::render('Pelanggan/Tagihan/Index', compact('tagihan'));
    }

    /**
     * Menampilkan form untuk mengedit data tagihan yang sudah ada, termasuk informasi pelanggan terkait.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Inertia\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'file_bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        try {
            DB::transaction(function () use ($request, $tagihan) {
                $tagihan->update([
                    'status' => 'pending',
                ]);

                $biaya_admin = 2500;

                Pembayaran::create([
                    'tagihan_id' => $tagihan->id,
                    'pelanggan_id' => $tagihan->pelanggan_id,
                    'tanggal_pembayaran' => now(),
                    'bulan_bayar' => $tagihan->bulan,
                    'biaya_admin' => $biaya_admin,
                    'total_bayar' => $tagihan->jumlah_biaya + $biaya_admin,
                    'file_bukti' => $this->uploadFile($request, 'file_bukti', 'uploads/bukti_pembayaran'),
                ]);
            });
            return redirect()->route('tagihan.index')->with('message', 'Pembayaran akan diproses');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
