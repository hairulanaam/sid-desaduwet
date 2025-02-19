<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    protected $table = 'status_perkawinan';

    protected $fillable = ['status_perkawinan', 'laki_laki', 'perempuan', 'jumlah_penduduk'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->jumlah_penduduk = $model->laki_laki + $model->perempuan;
        });
    }
}
