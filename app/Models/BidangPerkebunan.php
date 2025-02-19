<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BidangPerkebunan extends Model
{
    use HasFactory;

    protected $table = 'bidang_perkebunan';

    protected $fillable = ['judul', 'deskripsi', 'gambar'];

    // Method untuk menghapus gambar lama saat diperbarui
    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('bidang_perkebunan', 'public'); // Simpan di storage
        $this->update(['gambar' => $path]);
    }
}