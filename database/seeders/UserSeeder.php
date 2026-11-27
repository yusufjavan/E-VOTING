<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Demo
        // Nama: Ahmad Fauzi
        // NIA PBSB: 2026000001
        // Password: password
        // Role: pemilih
        //

        // 10 Pemilih contoh — termasuk akun demo "Ahmad Fauzi"
        $pemilih = [
            ['name' => 'Ahmad Fauzi',       'email' => 'fauzi@cssmora.test', 'nia_pbsb' => '2026000001'],
            ['name' => 'Siti Nurhaliza',     'email' => 'siti@cssmora.test', 'nia_pbsb' => '2026000002'],
            ['name' => 'Muhammad Rizky',     'email' => 'rizky@cssmora.test', 'nia_pbsb' => '2026000003'],
            ['name' => 'Nur Aisyah',         'email' => 'aisyah@cssmora.test', 'nia_pbsb' => '2026000004'],
            ['name' => 'Bagas Ramadhan',     'email' => 'bagas@cssmora.test', 'nia_pbsb' => '2026000005'],
            ['name' => 'Dina Maulida',       'email' => 'dina@cssmora.test', 'nia_pbsb' => '2026000006'],
            ['name' => 'Fajar Hidayat',      'email' => 'fajar@cssmora.test', 'nia_pbsb' => '2026000007'],
            ['name' => 'Lestari Dewi',       'email' => 'lestari@cssmora.test', 'nia_pbsb' => '2026000008'],
            ['name' => 'Rendi Kurniawan',    'email' => 'rendi@cssmora.test', 'nia_pbsb' => '2026000009'],
            ['name' => 'Zahra Amalia',       'email' => 'zahra@cssmora.test', 'nia_pbsb' => '2026000010'],
        ];

        foreach ($pemilih as $data) {
            User::create([
                'name' => $data['name'],
                'nia_pbsb' => $data['nia_pbsb'],
                'email' => $data['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'pemilih',
                'sudah_memilih' => false,
            ]);
        }
    }
}
