<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'anggota'];

    protected $casts = [
        'anggota' => 'array', // Konversi otomatis JSON ke array
    ];

    public function updateImage($file)
    {
        if ($this->gambar && Storage::disk('public')->exists($this->gambar)) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('struktur_organisasi', 'public');
        $this->update(['gambar' => $path]);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($strukturOrganisasi) {
            if ($strukturOrganisasi->gambar && Storage::disk('public')->exists($strukturOrganisasi->gambar)) {
                Storage::disk('public')->delete($strukturOrganisasi->gambar);
            }
        });
    }
}
