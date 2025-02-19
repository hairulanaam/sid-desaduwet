<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PeraturanBupati extends Model
{
    protected $table = 'peraturan_bupati';

    protected $fillable = [
        'nama_data',
        'tanggal',
        'file_path',
    ];

    public function updateFile($file)
    {
        if ($this->file_path) {
            Storage::disk('public')->delete($this->file_path);
        }

        $path = $file->store('peraturan_desa', 'public'); // Simpan di storage
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
