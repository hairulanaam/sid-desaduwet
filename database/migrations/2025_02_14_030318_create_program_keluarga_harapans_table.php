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
        Schema::create('program_keluarga_harapan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas'); 
            $table->integer('menerima_pkh')->default(0); 
            $table->integer('jumlah_kepala_keluarga')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_keluarga_harapan');
    }
};
