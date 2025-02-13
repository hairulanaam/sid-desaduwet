<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class GaleriKegiatan extends Model
{
    use SoftDeletes;
    
    protected $table = 'galeri_kegiatan';

    protected $fillable = [
        'judul',
        'gambar',
        'tanggal',
        'penulis',
        'deskripsi',
    ];

    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('galeri_kegiatan', 'public'); 
        $this->update(['gambar' => $path]);
    }
}