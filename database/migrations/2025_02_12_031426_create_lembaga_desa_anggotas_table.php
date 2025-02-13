<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lembaga_desa_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_desa_id')
                  ->constrained('lembaga_desas') // PASTIKAN SESUAI DENGAN TABEL UTAMA!
                  ->cascadeOnDelete(); // LEBIH CLEAN DARIPADA onDelete('cascade')

            $table->string('nama');
            $table->string('agama');
            $table->string('jabatan');
            $table->string('kontak');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lembaga_desa_anggota');
    }
};
