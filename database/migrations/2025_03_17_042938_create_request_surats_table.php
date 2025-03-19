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
        Schema::create('request_surat', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->unique();
            $table->string('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->string('jenis_surat');
            $table->enum('status', ['diminta', 'diproses', 'selesai', 'diantar'])->default('diminta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_surat');
    }
};