<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tarif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

/**
 * Controller untuk mengelola data tarif listrik.
 */
class TarifController extends Controller implements HasMiddleware
{
    /**
     * Mendefinisikan middleware berbasis permission.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware>
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:tarif.index'], only: ['index']),
            new Middleware(['permission:tarif.create'], only: ['create', 'store']),
            new Middleware(['permission:tarif.edit'], only: ['edit', 'update']),
            new Middleware(['permission:tarif.delete'], only: ['destroy']),
        ];
    }

    /**
     * Menampilkan daftar tarif listrik.
     *
     * Mendukung pencarian berdasarkan daya dan tarif per KWH.
     *
     * @queryParam q string Opsional. Kata kunci pencarian.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $tarif = Tarif::query()
            ->when(request()->q, function ($tarif) {
                $tarif->where('daya', 'like', '%' . request()->q . '%')
                    ->orWhere('tarifperkwh', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $tarif->appends(['q' => request()->q]);

        return Inertia::render('Admin/Tarif/Index', compact('tarif'));
    }

    /**
     * Menampilkan form pembuatan tarif.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Tarif/Create');
    }

    /**
     * Menyimpan data tarif baru.
     *
     * @param Request $request
     *
     * @bodyParam daya integer required Daya listrik (VA).
     * @bodyParam tarifperkwh number required Tarif per KWH.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'daya' => 'required|numeric',
            'tarifperkwh' => 'required|numeric',
        ]);

        Tarif::create([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->to('/admin/tarif')->with('success', 'Tarif created successfully.');
    }

    /**
     * Menampilkan form edit tarif.
     *
     * @param Tarif $tarif
     *
     * @return \Inertia\Response
     */
    public function edit(Tarif $tarif)
    {
        return Inertia::render('Admin/Tarif/Edit', compact('tarif'));
    }

    /**
     * Memperbarui data tarif.
     *
     * @param Request $request
     * @param Tarif $tarif
     *
     * @bodyParam daya integer required Daya listrik (VA).
     * @bodyParam tarifperkwh number required Tarif per KWH.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'daya' => 'required|numeric',
            'tarifperkwh' => 'required|numeric',
        ]);

        $tarif->update([
            'daya' => $request->daya,
            'tarifperkwh' => $request->tarifperkwh,
        ]);

        return redirect()->to('/admin/tarif')->with('success', 'Tarif updated successfully.');
    }

    /**
     * Menghapus data tarif.
     *
     * @param Tarif $tarif
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return redirect()->to('/admin/tarif')->with('success', 'Tarif deleted successfully.');
    }
}
