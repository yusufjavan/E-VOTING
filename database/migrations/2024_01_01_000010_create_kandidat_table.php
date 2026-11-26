<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('nomor')->unique();
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->string('foto')->nullable();
            $table->string('tagline');
            $table->string('latar_ketua');
            $table->string('latar_wakil');
            $table->string('visi_singkat');
            $table->text('visi_utama');
            $table->json('misi');
            $table->json('program_kerja');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kandidat');
    }
};
