<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PotensiDesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang',
        'deskripsi',
        'gambar'
    ];
}
