<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InfografisDesa extends Model
{
    use HasFactory;

    protected $table = 'infografis_desa'; // Nama tabel di database

    protected $fillable = [
        'Gambar',  // Sesuaikan nama kolom agar konsisten
        'Judul',
        'Deskripsi',
        'file_path',
    ];

    /**
     * Update gambar infografis desa
     */
    public function updateImage($file)
    {
        if ($this->Gambar && Storage::disk('public')->exists($this->Gambar)) {
            Storage::disk('public')->delete($this->Gambar);
        }

        $path = $file->store('infografis_desa', 'public'); // Simpan di storage
        $this->update(['Gambar' => $path]);
    }

    /**
     * Update file dokumen infografis desa
     */
    public function updateFile($file)
    {
        if ($this->file_path && Storage::disk('public')->exists($this->file_path)) {
            Storage::disk('public')->delete($this->file_path);
        }

        $path = $file->store('infografis_desa', 'public'); // Simpan di storage
        $this->update(['file_path' => $path]);
    }

    /**
     * Method untuk mendapatkan URL lengkap file dokumen.
     */
    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    /**
     * Method untuk mendapatkan URL lengkap gambar.
     */
    public function getImageUrlAttribute()
    {
        return $this->Gambar ? asset('storage/' . $this->Gambar) : null;
    }
}
