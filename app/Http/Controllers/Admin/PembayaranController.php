<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

/**
 * Controller untuk mengelola data pembayaran.
 */
class PembayaranController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:pembayaran.index'], only: ['index']),
            new Middleware(['permission:pembayaran.delete'], only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar pembayaran dengan fitur pencarian dan pagination.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::query()
            ->with(['pelanggan'])
            ->when(request()->q, function ($q) {
                $q->where('tanggal_pembayaran', 'like', '%' . request()->q . '%')
                    ->orWhere('bulan_bayar', 'like', '%' . request()->q . '%')
                    ->orWhereHas('pelanggan', function ($q) {
                        $q->where('nama', 'like', '%' . request()->q . '%');
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

    /**
     * Menghapus pembayaran dari database.
     *
     * @param Pembayaran $pembayaran
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->to('/admin/pembayaran')->with('success', 'Pembayaran deleted successfully.');
    }
}
