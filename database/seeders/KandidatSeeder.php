<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use Illuminate\Database\Seeder;

class KandidatSeeder extends Seeder
{
    public function run(): void
    {
        // ── Kandidat 01 ──────────────────────────────────────────────
        Kandidat::create([
            'nomor' => 1,
            'nama_ketua' => 'Ahmad Fauzi',
            'nama_wakil' => 'Siti Nurhaliza',
            'foto' => null,
            'tagline' => 'Mewujudkan Integritas, Sinergi, dan Dedikasi untuk Kemajuan CSSMoRA',
            'latar_ketua' => 'Teknik Informatika (Universitas Indonesia)',
            'latar_wakil' => 'Ilmu Komunikasi (Universitas Gadjah Mada)',
            'visi_singkat' => 'Mewujudkan CSSMoRA yang aktif, kolaboratif, dan berintegritas.',
            'visi_utama' => 'Mewujudkan CSSMoRA yang aktif, kolaboratif, profesional, dan berintegritas tinggi dalam memperkuat peran santri berprestasi di tingkat nasional.',
            'misi' => [
                'Meningkatkan kapabilitas kepemimpinan dan intelektual anggota melalui pelatihan terpadu.',
                'Membangun jejaring kemitraan strategis dengan institusi riset dan industri.',
                'Mengoptimalkan peran pengabdian masyarakat berbasis keilmuan dan kepesantrenan.',
                'Mewujudkan tata kelola organisasi yang transparan, modern, dan akuntabel.',
            ],
            'program_kerja' => [
                [
                    'judul' => 'CSSMoRA Research & Innovation Grant',
                    'deskripsi' => 'Dukungan pendanaan riset karya ilmiah santri nasional',
                ],
                [
                    'judul' => 'Akademi Kepemimpinan Santri (AKS)',
                    'deskripsi' => 'Pelatihan kepemimpinan berjenjang dan sertifikasi',
                ],
                [
                    'judul' => 'Pojok Pengabdian & Advokasi Beasiswa',
                    'deskripsi' => 'Pendampingan studi, beasiswa, dan desa binaan',
                ],
            ],
        ]);

        // ── Kandidat 02 ──────────────────────────────────────────────
        Kandidat::create([
            'nomor' => 2,
            'nama_ketua' => 'Nur Aisyah',
            'nama_wakil' => 'Muhammad Rizky',
            'foto' => null,
            'tagline' => 'Inovasi Berkelanjutan, Berdaya Saing Global, dan Membumi Bersama Santri',
            'latar_ketua' => 'Farmasi (Institut Teknologi Bandung)',
            'latar_wakil' => 'Hubungan Internasional (UIN Syarif Hidayatullah)',
            'visi_singkat' => 'Membangun ekosistem CSSMoRA yang inovatif dan berkelanjutan.',
            'visi_utama' => 'Membangun ekosistem CSSMoRA yang inovatif, berdaya saing global, inklusif, dan berdampak nyata bagi almamater, pesantren, serta bangsa.',
            'misi' => [
                'Mengakselerasi transformasi digital dan sistem informasi terpadu CSSMoRA.',
                'Mendorong prestasi riset, publikasi, dan karya teknologi berskala internasional.',
                'Memperkuat advokasi beasiswa dan kesejahteraan mahasiswa santri berprestasi.',
                'Memperluas program pemberdayaan pesantren dan masyarakat marjinal.',
            ],
            'program_kerja' => [
                [
                    'judul' => 'CSSMoRA Digital Hub & SuperApp',
                    'deskripsi' => 'Integrasi portal database, pemilu, dan keilmuan',
                ],
                [
                    'judul' => 'Global Santri Fellowship & Mentorship',
                    'deskripsi' => 'Pertukaran mahasiswa, riset kolaboratif, dan persiapan S2 luar negeri',
                ],
                [
                    'judul' => 'Bakti Santri Untuk Negeri (BSUN)',
                    'deskripsi' => 'Program pengabdian masyarakat santri berfokus pada literasi & ekonomi',
                ],
            ],
        ]);
    }
}
