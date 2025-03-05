<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    protected $table = 'data_penduduk';

    protected $fillable = [
        'no_kk',
        'nik',
        'nama_lengkap',
        'kabupaten_kota',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_hubungan_dalam_keluarga',
        'status_perkawinan',
        'agama',
        'pendidikan',
        'pekerjaan',
        'ayah',
        'ibu',
        'alamat',
        'rt',
        'rw',
        'kecamatan',
        'desa_kelurahan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date', // Pastikan MySQL membaca sebagai format tanggal
    ];
    
}
