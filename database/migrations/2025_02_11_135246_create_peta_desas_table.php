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
        Schema::create('peta_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('agama', 50);
            $table->string('jabatan', 255);
            $table->string('kontak', 20);
            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta_desa');
    }
};
