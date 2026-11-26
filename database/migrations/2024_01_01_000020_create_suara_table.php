<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel suara hanya menyimpan UUID acak dan kandidat_id.
     * Tanpa user_id dan tanpa timestamps agar suara
     * tidak bisa dicocokkan dengan pemilih lewat urutan maupun waktu.
     */
    public function up(): void
    {
        Schema::create('suara', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('kandidat_id')->constrained('kandidat')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suara');
    }
};
