<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index()
    {
        $pelanggan_id = Auth::guard('pelanggan')->user()->id;
        $trendData = Tagihan::selectRaw('bulan, tahun, SUM(jumlah_meter) as total_meter')
            ->where('pelanggan_id', $pelanggan_id)
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->get()
            ->groupBy('tahun')
            ->map(fn($rows) => $rows->pluck('total_meter', 'bulan'));

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
