<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiziBuruk extends Model
{
    protected $table = 'gizi_buruk';

    protected $fillable = [
        'kategori',
        'jumlah',
    ];
}
