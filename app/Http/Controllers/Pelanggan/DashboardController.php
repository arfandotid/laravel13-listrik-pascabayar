<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

/**
 * Class DashboardController
 * 
 * Controller ini bertanggung jawab untuk menampilkan halaman utama Dashboard Admin,
 * termasuk pengolahan data statistik tren penggunaan meteran listrik.
 * 
 * @package App\Http\Controllers\Pelanggan
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data tren tahunan.
     * 
     * Method ini mengambil data akumulasi 'jumlah_meter' dari tabel tagihan berdasarkan pelanggan yang sedang login,
     * mengelompokkannya berdasarkan tahun dan bulan, serta mengambil daftar tahun
     * yang tersedia untuk filter pada sisi klien (Inertia).
     * 
     * @return \Inertia\Response Render halaman Pelanggan/Dashboard/Index dengan data trend.
     */
    public function index()
    {
        // Mengambil data tren: dikelompokkan per tahun, lalu per bulan
        $pelanggan_id = Auth::guard('pelanggan')->user()->id;
        $trendData = Tagihan::selectRaw('bulan, tahun, SUM(jumlah_meter) as total_meter')
            ->where('pelanggan_id', $pelanggan_id)
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get()
            ->groupBy('tahun')
            ->map(fn($rows) => $rows->pluck('total_meter', 'bulan'));

        // Mengambil daftar tahun unik untuk dropdown filter
        $tahunList = Tagihan::selectRaw('DISTINCT tahun')
            ->where('pelanggan_id', $pelanggan_id)
            ->orderByDesc('tahun')
            ->pluck('tahun');

        return Inertia::render('Pelanggan/Dashboard/Index', [
            'trendData' => $trendData,
            'tahunList' => $tahunList,
        ]);
    }
}
