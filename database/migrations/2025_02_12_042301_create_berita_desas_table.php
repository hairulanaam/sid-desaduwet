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
        Schema::create('berita_desa', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255)->index(); 
            $table->string('gambar')->nullable(); 
            $table->date('tanggal'); 
            $table->string('penulis', 100); 
            $table->text('deskripsi'); 
            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_desa');
    }
};
