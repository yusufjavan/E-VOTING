<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1 Admin
        User::create([
            'name' => 'Ahmad Fauzan',
            'email' => 'admin@cssmora.test',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'sudah_memilih' => false,
        ]);

        // 10 Pemilih contoh — termasuk akun demo "Ahmad Fauzi"
        $pemilih = [
            ['name' => 'Ahmad Fauzi',       'email' => 'fauzi@cssmora.test'],
            ['name' => 'Siti Nurhaliza',     'email' => 'siti@cssmora.test'],
            ['name' => 'Muhammad Rizky',     'email' => 'rizky@cssmora.test'],
            ['name' => 'Nur Aisyah',         'email' => 'aisyah@cssmora.test'],
            ['name' => 'Bagas Ramadhan',     'email' => 'bagas@cssmora.test'],
            ['name' => 'Dina Maulida',       'email' => 'dina@cssmora.test'],
            ['name' => 'Fajar Hidayat',      'email' => 'fajar@cssmora.test'],
            ['name' => 'Lestari Dewi',       'email' => 'lestari@cssmora.test'],
            ['name' => 'Rendi Kurniawan',    'email' => 'rendi@cssmora.test'],
            ['name' => 'Zahra Amalia',       'email' => 'zahra@cssmora.test'],
        ];

        foreach ($pemilih as $data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'pemilih',
                'sudah_memilih' => false,
            ]);
        }
    }
}
