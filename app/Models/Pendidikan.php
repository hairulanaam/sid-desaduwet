<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan'; // Nama tabel di database

    protected $fillable = [
        'nama_pendidikan',
        'laki_laki',
        'perempuan',
        'jumlah_penduduk',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->jumlah_penduduk = $model->laki_laki + $model->perempuan;
        });
    }
}
