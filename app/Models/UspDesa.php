<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UspDesa extends Model
{
    use HasFactory;

    protected $table = 'usp_desa';

    protected $fillable = ['judul', 'deskripsi', 'gambar'];

    // Method untuk menghapus gambar lama saat diperbarui
    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('usp_desa', 'public'); // Simpan di storage
        $this->update(['gambar' => $path]);
    }
}