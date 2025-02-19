<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DireksiBumdes extends Model
{
    use HasFactory;

    protected $table = 'direksi_bumdes';

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'anggota'];

    protected $casts = [
        'anggota' => 'array', // Konversi otomatis JSON ke array
    ];

    public function updateImage($file)
    {
        if ($this->gambar && Storage::disk('public')->exists($this->gambar)) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('direksi_bumdes', 'public');
        $this->update(['gambar' => $path]);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($direksibumdes) {
            if ($direksibumdes->gambar && Storage::disk('public')->exists($direksibumdes->gambar)) {
                Storage::disk('public')->delete($direksibumdes->gambar);
            }
        });
    }
}
