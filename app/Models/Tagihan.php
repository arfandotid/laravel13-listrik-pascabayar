<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('tagihan')]
#[Fillable([
    'penggunaan_id',
    'pelanggan_id',
    'bulan',
    'tahun',
    'jumlah_meter',
    'status'
])]

class Tagihan extends Model
{
    //
}
