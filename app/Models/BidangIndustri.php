<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BidangIndustri extends Model
{
    use HasFactory;

    protected $table = 'bidang_industri';

    protected $fillable = ['judul', 'deskripsi', 'gambar'];

    // Method untuk menghapus gambar lama saat diperbarui
    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('bidang_industri', 'public'); // Simpan di storage
        $this->update(['gambar' => $path]);
    }
}