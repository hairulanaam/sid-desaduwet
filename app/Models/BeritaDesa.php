<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BeritaDesa extends Model
{
    use SoftDeletes;
    
    protected $table = 'berita_desa';

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

        $path = $file->store('berita_desa', 'public'); 
        $this->update(['gambar' => $path]);
    }
}