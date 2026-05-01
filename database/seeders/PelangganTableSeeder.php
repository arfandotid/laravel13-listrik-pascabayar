<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'nama' => 'User',
                'email' => 'user@gmail.com',
                'username' => 'user',
                'password' => bcrypt('password'),
                'no_kwh' => '1234567890',
                'alamat' => 'Jl. Contoh Alamat 1',
                'tarif_id' => 1
            ],
            [
                'nama' => 'User 2',
                'email' => 'user2@gmail.com',
                'username' => 'user2',
                'password' => bcrypt('password'),
                'no_kwh' => '0987654321',
                'alamat' => 'Jl. Contoh Alamat 2',
                'tarif_id' => 2
            ],
        ]);
    }
}
