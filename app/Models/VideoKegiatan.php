<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class VideoKegiatan extends Model
{
    use SoftDeletes;
    
    protected $table = 'video_kegiatan';

    protected $fillable = [
        'judul',
        'gambar',
        'tanggal',
        'sumber',
        'url',
    ];

    public function updateImage($file)
    {
        if ($this->gambar) {
            Storage::disk('public')->delete($this->gambar);
        }

        $path = $file->store('video_kegiatan', 'public'); 
        $this->update(['gambar' => $path]);
    }
    // Fungsi untuk mengekstrak Video ID dari URL YouTube
    public function getYoutubeIdAttribute()
    {
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|.*&v=))([^&?]+)/', $this->url, $matches);
        return $matches[1] ?? null;
    }
}