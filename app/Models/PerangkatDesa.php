<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Storage;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'foto'
    ];

}