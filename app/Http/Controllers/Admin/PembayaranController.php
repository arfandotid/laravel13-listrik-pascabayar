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
            new Middleware(['permission:pembayaran.delete'], only: ['destroy']),
        ];
    }

    public function index()
    {
        $pembayaran = Pembayaran::query()
            ->with(['pelanggan', 'user'])
            ->when(request()->q, function ($q) {
                $q->where('tanggal_pembayaran', 'like', '%' . request()->q . '%')
                    ->orWhere('bulan_bayar', 'like', '%' . request()->q . '%')
                    ->orWhereHas('pelanggan', function ($q) {
                        $q->where('nama', 'like', '%' . request()->q . '%');
                    })
                    ->orWhereHas('user', function ($q) {
                        $q->where('name', 'like', '%' . request()->q . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $pembayaran->appends(['q' => request()->q]);

        return Inertia::render('Admin/Pembayaran/Index', compact('pembayaran'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran deleted successfully.');
    }
}
