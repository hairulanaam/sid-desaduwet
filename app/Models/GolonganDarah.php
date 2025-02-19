<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolonganDarah extends Model
{
    protected $table = 'golongan_darah';

    protected $fillable = ['golongan_darah', 'laki_laki', 'perempuan', 'jumlah_penduduk'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->jumlah_penduduk = $model->laki_laki + $model->perempuan;
        });
    }
}
