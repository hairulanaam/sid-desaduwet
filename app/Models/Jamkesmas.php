<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamkesmas extends Model
{
    protected $table = 'jamkesmas';

    protected $fillable = [
        'nama_kelas',
        'menerima_jamkesmas',
        'jumlah_kepala_keluarga',
    ];
}
