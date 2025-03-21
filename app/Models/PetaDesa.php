<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaDesa extends Model
{
    use HasFactory;
    
    protected $table = 'peta_desa'; // Sesuaikan dengan nama tabel di migration
    
    protected $fillable = [
        'masjid',
        'mushalla',
        'pemakaman',
        'paud',
        'tk',
        'sd',
        'smp',
        'pondok_pesantren',
        'lembaga_kursus',
        'lapangan_sepak_bola',
        'poskesdes',
        'posyandu',
        'balai_desa',
    ];
}