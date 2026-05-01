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
    'jumlah_biaya',
    'status'
])]

class Tagihan extends Model
{
    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class, 'penggunaan_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
