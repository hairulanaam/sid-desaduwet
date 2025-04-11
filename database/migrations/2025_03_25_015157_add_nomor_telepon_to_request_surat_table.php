<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('request_surat', function (Blueprint $table) {
            $table->string('nomor_telepon', 20)->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('request_surat', function (Blueprint $table) {
            $table->dropColumn('nomor_telepon');
        });
    }
};