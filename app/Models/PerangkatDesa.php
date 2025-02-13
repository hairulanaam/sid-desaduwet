<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desa';

    protected $fillable = ['nama', 'jabatan', 'gambar'];

    // Method untuk menghapus gambar lama saat diperbarui
    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('perangkat_desa', 'public'); // Simpan di storage/app/public/sejarah
        $this->update(['gambar' => $path]);
    }
}
