<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarif')->insert([
            ['daya' => 450, 'tarifperkwh' => 415.00],
            ['daya' => 900, 'tarifperkwh' => 1352.00],
            ['daya' => 1300, 'tarifperkwh' => 1444.70],
            ['daya' => 2200, 'tarifperkwh' => 1444.70],
            ['daya' => 3500, 'tarifperkwh' => 1669.53],
        ]);
    }
}
