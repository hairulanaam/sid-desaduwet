<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuruhMigran extends Model
{
    use HasFactory;

    protected $table = 'buruh_migran';

    protected $fillable = [
        'kategori',
        'jumlah',
    ];
}
