<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'judul',
        'tanggal',
        'jam',
        'agenda',
        'lokasi',
        'petugas'
    ];

    /**
     * Format tanggal secara otomatis jika diperlukan.
     */
    protected $casts = [
        'tanggal' => 'date',
        'jam' => 'string', 
    ];

}
