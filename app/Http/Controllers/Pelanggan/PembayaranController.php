<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PembayaranController extends Controller
{

    public function index()
    {
        $pelanggan_id = Auth::guard('pelanggan')->user()->id;
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
            ->where('pelanggan_id', $pelanggan_id)
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        return Inertia::render('Pelanggan/Pembayaran/Index', compact('pembayaran'));
    }
}
