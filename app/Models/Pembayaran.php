<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('pembayaran')]
#[Fillable([
    'tagihan_id',
    'pelanggan_id',
    'tanggal_pembayaran',
    'bulan_bayar',
    'biaya_admin',
    'total_bayar',
    'user_id',
])]

class Pembayaran extends Model
{
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
