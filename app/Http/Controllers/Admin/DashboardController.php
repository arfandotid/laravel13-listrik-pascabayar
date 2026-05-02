<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index()
    {
        $trendData = Tagihan::selectRaw('bulan, tahun, SUM(jumlah_meter) as total_meter')
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get()
            ->groupBy('tahun')
            ->map(fn($rows) => $rows->pluck('total_meter', 'bulan'));

        $tahunList = Tagihan::selectRaw('DISTINCT tahun')
            ->orderByDesc('tahun')
            ->pluck('tahun');

        return Inertia::render('Admin/Dashboard/Index', [
            'trendData' => $trendData,
            'tahunList' => $tahunList,
        ]);
    }
}
