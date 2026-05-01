<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PelangganController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(['permission:pelanggan.index'], only: ['index']),
            new Middleware(['permission:pelanggan.create'], only: ['create', 'store']),
            new Middleware(['permission:pelanggan.edit'], only: ['edit', 'update']),
            new Middleware(['permission:pelanggan.delete'], only: ['destroy']),
        ];
    }

    public function index()
    {
        $pelanggan = Pelanggan::query()
            ->when(request()->q, function ($q) {
                $q->where('nama', 'like', '%' . request()->q . '%')
                    ->orWhere('email', 'like', '%' . request()->q . '%')
                    ->orWhere('no_kwh', 'like', '%' . request()->q . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->withQueryString();

        $pelanggan->appends(['q' => request()->q]);

        return Inertia::render('Admin/Pelanggan/Index', compact('pelanggan'));
    }

    public function create()
    {
        return Inertia::render('Admin/Pelanggan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8',
            'no_kwh' => 'required',
            'alamat' => 'required',
            'tarif_id' => 'required',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'no_kwh' => $request->no_kwh,
            'alamat' => $request->alamat,
            'tarif_id' => $request->tarif_id,
        ]);

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan created successfully.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return Inertia::render('Admin/Pelanggan/Edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'nullable|string|min:8',
            'no_kwh' => 'required',
            'alamat' => 'required',
            'tarif_id' => 'required',
        ]);

        $pelanggan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $pelanggan->password,
            'no_kwh' => $request->no_kwh,
            'alamat' => $request->alamat,
            'tarif_id' => $request->tarif_id,
        ]);

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan updated successfully.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->to('/admin/pelanggan')->with('success', 'Pelanggan deleted successfully.');
    }
}
