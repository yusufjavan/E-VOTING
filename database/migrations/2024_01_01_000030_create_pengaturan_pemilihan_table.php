<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel pengaturan_pemilihan berisi satu baris konfigurasi pemilihan.
     */
    public function up(): void
    {
        Schema::create('pengaturan_pemilihan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('periode');
            $table->dateTime('mulai');
            $table->dateTime('selesai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_pemilihan');
    }
};
