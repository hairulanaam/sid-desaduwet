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
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 20);
            $table->string('nik', 16);
            $table->string('nama_lengkap');
            $table->string('kabupaten_kota');
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('status_hubungan_dalam_keluarga');
            $table->string('status_perkawinan');
            $table->string('agama');
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->text('alamat');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('kecamatan');
            $table->string('desa_kelurahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduk');
    }
};
