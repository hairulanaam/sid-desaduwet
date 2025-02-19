<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('kepala_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->integer('jumlah_keluarga')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_keluarga');
    }
};
