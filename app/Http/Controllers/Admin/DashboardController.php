<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class DashboardController
 * 
 * Controller ini bertanggung jawab untuk menampilkan halaman utama Dashboard Admin,
 * termasuk pengolahan data statistik tren penggunaan meteran listrik.
 * 
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan data tren tahunan.
     * 
     * Method ini mengambil data akumulasi 'jumlah_meter' dari tabel tagihan,
     * mengelompokkannya berdasarkan tahun dan bulan, serta mengambil daftar tahun
     * yang tersedia untuk filter pada sisi klien (Inertia).
     * 
     * @return \Inertia\Response Render halaman Admin/Dashboard/Index dengan data trend.
     */
    public function index(): Response
    {
        // Mengambil data tren: dikelompokkan per tahun, lalu per bulan
        $trendData = Tagihan::selectRaw('bulan, tahun, SUM(jumlah_meter) as total_meter')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get()
            ->groupBy('tahun')
            ->map(fn($rows) => $rows->pluck('total_meter', 'bulan'));

        // Mengambil daftar tahun unik untuk dropdown filter
        $tahunList = Tagihan::selectRaw('DISTINCT tahun')
            ->orderByDesc('tahun')
            ->pluck('tahun');

        return Inertia::render('Admin/Dashboard/Index', [
            'trendData' => $trendData,
            'tahunList' => $tahunList,
        ]);
    }
}
