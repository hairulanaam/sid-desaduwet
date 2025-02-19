<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kehamilan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->integer('perempuan')->default(0);
            $table->integer('jumlah_penduduk')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kehamilan');
    }
};
