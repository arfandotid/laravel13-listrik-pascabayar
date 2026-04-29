<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('pelanggan')]
#[Fillable([
    'nama',
    'username',
    'password',
    'no_kwh',
    'alamat',
    'tarif_id',
])]

class Pelanggan extends Model
{
    //
}
