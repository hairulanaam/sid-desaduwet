<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaDesa extends Model
{
    use HasFactory;

    protected $table = 'peta_desa'; // Sesuaikan dengan nama tabel di migration

    protected $fillable = [
        'nama',
        'agama',
        'jabatan',
        'kontak',
    ];
}
