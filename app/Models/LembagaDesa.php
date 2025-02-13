<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LembagaDesa extends Model
{
    use HasFactory; // Opsional, untuk fitur factory

    protected $fillable = ['judul', 'deskripsi'];

    /**
     * Relasi ke tabel anggota lembaga desa
     */
    public function anggota(): HasMany
    {
        return $this->hasMany(LembagaDesaAnggota::class, 'lembaga_desa_id');
    }
}
