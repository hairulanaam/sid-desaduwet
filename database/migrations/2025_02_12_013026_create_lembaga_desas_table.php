<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lembaga_desas', function (Blueprint $table) { // GANTI MENJADI "lembaga_desas"
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lembaga_desas'); // GANTI MENJADI "lembaga_desas"
    }
};
