<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InformasiUmum extends Model
{
    protected $table = 'informasi_umum';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tabel'];

    protected $casts = [
        'tabel' => 'array', // Konversi otomatis ke array saat diambil dari database
    ];

    // Method untuk menghapus gambar lama saat diperbarui
    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('informasi_umum', 'public');
        $this->update(['gambar' => $path]);
    }
}
