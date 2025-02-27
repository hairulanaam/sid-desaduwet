<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JumlahPenduduk extends Model
{
    use HasFactory;

    protected $table = 'jumlah_penduduk'; // Nama tabel di database

    protected $fillable = [
        'kategori',
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
