<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeluargaHarapan extends Model
{
    protected $table = 'program_keluarga_harapan';

    protected $fillable = [
        'nama_kelas',
        'menerima_pkh',
        'jumlah_kepala_keluarga',
    ];
}
