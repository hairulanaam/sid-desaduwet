<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';

    protected $fillable = ['agama', 'laki_laki', 'perempuan', 'jumlah_penduduk'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->jumlah_penduduk = $model->laki_laki + $model->perempuan;
        });
    }
}
