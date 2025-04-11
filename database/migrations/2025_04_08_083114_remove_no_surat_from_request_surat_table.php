<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('request_surat', function (Blueprint $table) {
            $table->dropUnique(['no_surat']); // Hapus constraint unique terlebih dahulu
            $table->dropColumn('no_surat');  // Kemudian hapus kolom
        });
    }

    public function down()
    {
        Schema::table('request_surat', function (Blueprint $table) {
            $table->string('no_surat')->unique()->after('id');
        });
    }
};