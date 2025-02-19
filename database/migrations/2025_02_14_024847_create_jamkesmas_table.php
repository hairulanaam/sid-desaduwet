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
        Schema::create('jamkesmas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas'); 
            $table->integer('menerima_jamkesmas')->default(0); 
            $table->integer('jumlah_kepala_keluarga')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamkesmas');
    }
};
