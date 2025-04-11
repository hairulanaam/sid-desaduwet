<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSurat extends Model
{
    use HasFactory;

    protected $table = 'request_surat';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_surat',
        'status',
        'nomor_telepon'
    ];

}