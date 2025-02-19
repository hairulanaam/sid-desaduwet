<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiDesa extends Model
{
    protected $fillable = [
        'nama_desa',
        'penduduk',
        'kepala_keluarga',
        'dusun',
        'rt_rw',
        'luas_wilayah',
        'peta_desa',
        'alamat_desa',
        'telepon_desa',
    ];
}
