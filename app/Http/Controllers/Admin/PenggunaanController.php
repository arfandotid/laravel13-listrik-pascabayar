<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Penggunaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PenggunaanController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(['permission:penggunaan.index'], only: ['index']),
            new Middleware(['permission:penggunaan.create'], only: ['create', 'store']),
            new Middleware(['permission:penggunaan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:penggunaan.delete'], only: ['destroy']),
        ];
    }

    public function index()
    {
        $penggunaan = Penggunaan::query()
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

    public function create()
    {
        return Inertia::render('Admin/Penggunaan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        Penggunaan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
        ]);

        return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan created successfully.');
    }

    public function edit(Penggunaan $penggunaan)
    {
        return Inertia::render('Admin/Penggunaan/Edit', compact('penggunaan'));
    }

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

    public function destroy(Penggunaan $penggunaan)
    {
        $penggunaan->delete();

        return redirect()->to('/admin/penggunaan')->with('success', 'Penggunaan deleted successfully.');
    }
}
