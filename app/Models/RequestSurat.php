<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSurat extends Model
{
    use HasFactory;

    protected $table = 'request_surat';

    protected $fillable = [
        'no_surat',
        'nik',
        'nama',
        'alamat',
        'jenis_surat',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate automatic no_surat if not provided
            if (!$model->no_surat) {
                $latestId = self::max('id') ?? 0;
                $nextId = $latestId + 1;
                $year = date('Y');
                $model->no_surat = "{$year}/{$nextId}";
            }
        });
    }
}