<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InformasiUmum extends Model
{
    use HasFactory;

    protected $table = 'informasi_umum';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tabel'];

    protected $casts = [
        'tabel' => 'array', // Konversi otomatis ke array saat diambil dari database
    ];


    public function updateImage($file)
    {
        if (!$file || !$file->isValid()) {
            return; // Hindari error jika file tidak valid
        }

        // Hapus gambar lama jika ada
        if (!empty($this->gambar) && Storage::disk('public')->exists($this->gambar)) {
            Storage::disk('public')->delete($this->gambar);
        }

        // Simpan gambar baru
        $path = $file->store('informasi_umum', 'public');
        $this->gambar = $path;
        $this->save(); // Simpan perubahan ke database
    }
}
