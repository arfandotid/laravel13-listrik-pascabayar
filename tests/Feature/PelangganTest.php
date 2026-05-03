<?php

namespace Tests\Feature;

use App\Models\Pelanggan;
use App\Models\Tarif;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PelangganTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_pelanggan_with_mass_assignment_and_login(): void
    {
        // 1. Persiapkan data Tarif untuk relasi foreign key tarif_id
        $tarif = Tarif::create([
            'daya' => 1300,
            'tarifperkwh' => 1444.70,
        ]);

        $plainPassword = 'rahasia-password';

        $data = [
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'username' => 'budisantoso',
            'password' => Hash::make($plainPassword),
            'no_kwh' => '123456789012',
            'alamat' => 'Jl. Merdeka No 45',
            'tarif_id' => $tarif->id,
        ];

        // 2. Test Mass Assignment (Pembuatan model Pelanggan)
        $pelanggan = Pelanggan::create($data);

        $this->assertDatabaseHas('pelanggan', [
            'email' => 'budi@example.com',
            'username' => 'budisantoso',
            'no_kwh' => '123456789012',
        ]);

        $this->assertEquals('Budi Santoso', $pelanggan->nama);

        // 3. Test Login Otentikasi
        // Karena Pelanggan extends Authenticatable, model ini dapat digunakan pada session login
        Auth::login($pelanggan);

        // Memastikan ada user yang sedang login di session
        $this->assertAuthenticated();

        // Memastikan user yang login (diwakili ID) sama dengan id pelanggan yang kita buat
        $this->assertEquals(Auth::id(), $pelanggan->id);
    }
}
