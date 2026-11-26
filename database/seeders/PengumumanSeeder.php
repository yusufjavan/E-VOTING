<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $pengumuman = [
            [
                'judul' => 'Informasi Jadwal Pemilihan Ketua CSSMoRA',
                'isi' => 'Pemilihan Ketua CSSMoRA akan dilaksanakan pada 12–14 November 2026, pukul 08.00–17.00 WIB. Pastikan Anda telah terdaftar sebagai pemilih dan siapkan akun Anda untuk menggunakan hak suara.',
                'tanggal' => '2026-11-10',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Panduan Pemungutan Suara',
                'isi' => 'Pemungutan suara dilakukan secara daring melalui portal CSSMoRA E-Voting. Setiap pemilih hanya memiliki satu kesempatan untuk memilih. Suara yang telah dikirim tidak dapat diubah. Pastikan Anda memilih dengan bijak.',
                'tanggal' => '2026-11-09',
                'dipublikasikan' => true,
            ],
            [
                'judul' => 'Pengingat: Pemilihan akan ditutup pada 14 Nov',
                'isi' => 'Pemilihan Ketua CSSMoRA akan ditutup pada 14 November 2026 pukul 17.00 WIB. Segera gunakan hak pilih Anda sebelum batas waktu berakhir.',
                'tanggal' => '2026-11-09',
                'dipublikasikan' => true,
            ],
        ];

        foreach ($pengumuman as $data) {
            Pengumuman::create($data);
        }
    }
}
