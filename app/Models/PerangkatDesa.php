<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerangkatDesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'foto'
    ];
}
