<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TagihanController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(['permission:tagihan.index'], only: ['index']),
            new Middleware(['permission:tagihan.create'], only: ['create', 'store']),
            new Middleware(['permission:tagihan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:tagihan.delete'], only: ['destroy']),
        ];
    }

    public function index()
    {
        $tagihan = Tagihan::query()
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

    public function create()
    {
        return Inertia::render('Admin/Tagihan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penggunaan_id' => 'required',
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_meter' => 'required',
            'status' => 'required',
        ]);

        Tagihan::create([
            'penggunaan_id' => $request->penggunaan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_meter' => $request->jumlah_meter,
            'status' => $request->status,
        ]);

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan created successfully.');
    }

    public function edit(Tagihan $tagihan)
    {
        return Inertia::render('Admin/Tagihan/Edit', compact('tagihan'));
    }

    public function update(Request $request, Tagihan $tagihan)
    {
        $request->validate([
            'penggunaan_id' => 'required',
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah_meter' => 'required',
            'status' => 'required',
        ]);

        $tagihan->update([
            'penggunaan_id' => $request->penggunaan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_meter' => $request->jumlah_meter,
            'status' => $request->status,
        ]);

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan updated successfully.');
    }

    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->to('/admin/tagihan')->with('success', 'Tagihan deleted successfully.');
    }
}
