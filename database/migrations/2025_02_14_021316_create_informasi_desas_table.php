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
        Schema::create('informasi_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->integer('penduduk');
            $table->integer('kepala_keluarga');
            $table->integer('dusun');
            $table->string('rt_rw');
            $table->decimal('luas_wilayah');
            $table->text('peta_desa');
            $table->text('alamat_desa');
            $table->string('telepon_desa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_desas');
    }
};
