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
        Schema::table('data_penduduk', function (Blueprint $table) {
            $table->string('password')->after('desa_kelurahan'); // Tambahkan kolom password
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_penduduk', function (Blueprint $table) {
            $table->dropColumn('password'); // Hapus kolom password jika rollback
        });
    }
};