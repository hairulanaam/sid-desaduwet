<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('informasi_umum', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->json('tabel')->nullable()->default(json_encode([])); // Memastikan JSON tidak NULL
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi_umum'); // Menggunakan table() opsional
    }
};
