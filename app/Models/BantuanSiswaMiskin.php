<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BantuanSiswaMiskin extends Model
{
    use HasFactory;

    protected $table = 'bantuan_siswa_miskin';

    protected $fillable = [
        'kategori',
        'jumlah',
    ];
}
