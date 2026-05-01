<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('pelanggan')]
#[Fillable([
    'nama',
    'email',
    'username',
    'password',
    'no_kwh',
    'alamat',
    'tarif_id',
])]
#[Hidden(['password'])]

class Pelanggan  extends Authenticatable
{
    //
}
