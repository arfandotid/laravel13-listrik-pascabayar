<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('tarif')]
#[Fillable([
    'daya',
    'tarifperkwh',
])]

class Tarif extends Model
{
    //
}
