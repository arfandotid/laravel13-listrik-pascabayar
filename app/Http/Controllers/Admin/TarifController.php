<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Tarif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class TarifController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(['permission:tarif.index'], only: ['index']),
            new Middleware(['permission:tarif.create'], only: ['create', 'store']),
            new Middleware(['permission:tarif.edit'], only: ['edit', 'update']),
            new Middleware(['permission:tarif.delete'], only: ['destroy']),
        ];
    }

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

    public function create()
    {
        return Inertia::render('Admin/Tarif/Create');
    }

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

    public function edit(Tarif $tarif)
    {
        return Inertia::render('Admin/Tarif/Edit', compact('tarif'));
    }

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

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return redirect()->to('/admin/tarif')->with('success', 'Tarif deleted successfully.');
    }
}
