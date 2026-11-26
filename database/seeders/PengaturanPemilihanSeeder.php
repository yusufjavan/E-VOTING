<?php

namespace Database\Seeders;

use App\Models\PengaturanPemilihan;
use Illuminate\Database\Seeder;

class PengaturanPemilihanSeeder extends Seeder
{
    public function run(): void
    {
        PengaturanPemilihan::create([
            'nama' => 'Pemilihan Ketua CSSMoRA',
            'periode' => '2027 – 2028',
            'mulai' => '2026-11-12 08:00:00',
            'selesai' => '2026-11-14 17:00:00',
        ]);
    }
}
