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
        Schema::create('status_perkawinan', function (Blueprint $table) {
            $table->id();
            $table->string('status_perkawinan'); 
            $table->integer('laki_laki')->default(0); 
            $table->integer('perempuan')->default(0); 
            $table->integer('jumlah_penduduk')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_perkawinan');
    }
};
