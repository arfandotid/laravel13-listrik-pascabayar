<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('penggunaan')]
#[Fillable([
    'pelanggan_id',
    'bulan',
    'tahun',
    'meter_awal',
    'meter_akhir',
])]

class Penggunaan extends Model
{
    //
}
