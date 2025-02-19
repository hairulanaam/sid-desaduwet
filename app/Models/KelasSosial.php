<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasSosial extends Model
{
    protected $table = 'kelas_sosial';

    protected $fillable = [
        'nama_kelas',
        'jumlah_keluarga',
    ];
}
