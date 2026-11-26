<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use App\Models\Pengumuman;
use App\Models\PengaturanPemilihan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KandidatSeeder::class,
            PengaturanPemilihanSeeder::class,
            PengumumanSeeder::class,
        ]);
    }
}
