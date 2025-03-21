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
        Schema::table('peta_desa', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn(['nama', 'agama', 'jabatan', 'kontak']);

            // Tambahkan kolom baru
            $table->string('masjid', 255)->nullable();
            $table->string('mushalla', 255)->nullable();
            $table->string('pemakaman', 255)->nullable();
            $table->string('paud', 255)->nullable();
            $table->string('tk', 255)->nullable();
            $table->string('sd', 255)->nullable();
            $table->string('smp', 255)->nullable();
            $table->string('pondok_pesantren', 255)->nullable();
            $table->string('lembaga_kursus', 255)->nullable();
            $table->string('lapangan_sepak_bola', 255)->nullable();
            $table->string('poskesdes', 255)->nullable();
            $table->string('posyandu', 255)->nullable();
            $table->string('balai_desa', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('peta_desa', function (Blueprint $table) {
            // Hapus kolom baru
            $table->dropColumn([
                'masjid',
                'mushalla',
                'pemakaman',
                'paud',
                'tk',
                'sd',
                'smp',
                'pondok_pesantren',
                'lembaga_kursus',
                'lapangan_sepak_bola',
                'poskesdes',
                'posyandu',
                'balai_desa'
            ]);

            // Tambahkan kembali kolom lama
            $table->string('nama', 255);
            $table->string('agama', 50);
            $table->string('jabatan', 255);
            $table->string('kontak', 20);
        });
    }
};
