<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';

    protected $fillable = ['visi', 'misi', 'file_path'];

    /**
     * Method untuk menghapus file lama saat diperbarui.
     */
    public function updateFile($file)
    {
        if ($this->file_path) {
            Storage::disk('public')->delete($this->file_path);
        }

        $path = $file->store('visi_misi', 'public'); // Simpan di storage
        $this->update(['file_path' => $path]);
    }

    /**
     * Method untuk mendapatkan URL lengkap file.
     */
    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
