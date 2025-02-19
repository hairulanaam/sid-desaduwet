<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Berita extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul',
        'tanggal_publish',
        'deskripsi',
        'gambar'
    ];

    protected $casts = [
        'tanggal_publish' => 'datetime', // Konversi otomatis ke objek Carbon
    ];

    // Tambahkan accessor untuk format tanggal otomatis
    public function getFormattedTanggalAttribute()
    {
        return Carbon::parse($this->tanggal_publish)->translatedFormat('d F Y');
    }
    
}
