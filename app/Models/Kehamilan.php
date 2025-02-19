<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehamilan extends Model
{
    use HasFactory;

    protected $table = 'kehamilan';

    protected $fillable = [
        'kategori',
        'perempuan',
        'jumlah_penduduk',
    ];

    // Set jumlah_penduduk otomatis sesuai jumlah perempuan
    public static function boot()
    {
        parent::boot();

        static::saving(function ($kehamilan) {
            $kehamilan->jumlah_penduduk = $kehamilan->perempuan;
        });
    }
}
