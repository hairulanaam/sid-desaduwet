<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaKeluarga extends Model
{
    protected $table = 'kepala_keluarga';

    protected $fillable = [
        'kategori',
        'jumlah_keluarga',
    ];
}
