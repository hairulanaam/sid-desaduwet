<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infografis_desa', function (Blueprint $table) {
            $table->id();
            $table->string('Gambar')->nullable();
            $table->string('Judul');
            $table->text('Deskripsi'); 
            $table->string('file_path'); // Kolom untuk menyimpan path file yang diupload
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infografis_desa');
    }
};
