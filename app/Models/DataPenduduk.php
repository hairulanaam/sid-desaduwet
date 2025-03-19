<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataPenduduk extends Authenticatable
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
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Hash password sebelum menyimpan ke database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    
    // Definisikan username yang digunakan untuk autentikasi
    public function username()
    {
        return 'nik'; // Ubah sesuai field yang digunakan untuk login (misalnya 'nik')
    }
}