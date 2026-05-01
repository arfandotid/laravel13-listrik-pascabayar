<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PembayaranController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(['permission:pembayaran.index'], only: ['index']),
            new Middleware(['permission:pembayaran.create'], only: ['create', 'store']),
            new Middleware(['permission:pembayaran.edit'], only: ['edit', 'update']),
            new Middleware(['permission:pembayaran.delete'], only: ['destroy']),
        ];
    }

    public function index()
    {
        $pembayaran = Pembayaran::query()
            ->when(request()->q, function ($q) {
                $q->where('tanggal_pembayaran', 'like', '%' . request()->q . '%')
                    ->orWhere('bulan_bayar', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $pembayaran->appends(['q' => request()->q]);

        return Inertia::render('Admin/Pembayaran/Index', compact('pembayaran'));
    }

    public function create()
    {
        return Inertia::render('Admin/Pembayaran/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id' => 'required',
            'pelanggan_id' => 'required',
            'tanggal_pembayaran' => 'required',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
            'total_bayar' => 'required',
            'user_id' => 'required',
        ]);

        Pembayaran::create([
            'tagihan_id' => $request->tagihan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'bulan_bayar' => $request->bulan_bayar,
            'biaya_admin' => $request->biaya_admin,
            'total_bayar' => $request->total_bayar,
            'user_id' => $request->user_id,
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran created successfully.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return Inertia::render('Admin/Pembayaran/Edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'tagihan_id' => 'required',
            'pelanggan_id' => 'required',
            'tanggal_pembayaran' => 'required',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
            'total_bayar' => 'required',
            'user_id' => 'required',
        ]);

        $pembayaran->update([
            'tagihan_id' => $request->tagihan_id,
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'bulan_bayar' => $request->bulan_bayar,
            'biaya_admin' => $request->biaya_admin,
            'total_bayar' => $request->total_bayar,
            'user_id' => $request->user_id,
        ]);

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran updated successfully.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran deleted successfully.');
    }
}
