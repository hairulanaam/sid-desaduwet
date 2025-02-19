<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LembagaDesaAnggota extends Model
{
    use HasFactory;

    // Pastikan nama tabel benar (default Laravel menambahkan "s" ke nama model)
    protected $table = 'lembaga_desa_anggota';

    // Definisikan kolom yang bisa diisi secara massal
    protected $fillable = ['lembaga_desa_id', 'nama', 'agama', 'jabatan', 'kontak'];

    /**
     * Relasi ke Lembaga Desa
     */
    public function lembagaDesa(): BelongsTo
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_desa_id', 'id');
    }
}
