<?php

namespace App\Repositories\Dummy;

use App\Repositories\Dummy\Concerns\UsesDummyStore;
use App\Repositories\PengaturanRepository;

class DummyPengaturanRepository implements PengaturanRepository
{
    use UsesDummyStore;

    public function semua(): array
    {
        return $this->loadStore();
    }

    public function ambil(string $kunci, mixed $default = null): mixed
    {
        $semua = $this->loadStore();

        return $semua[$kunci] ?? $default;
    }

    public function perbaruiBanyak(array $data): array
    {
        $terkini = array_merge($this->loadStore(), $data);
        $this->saveStore($terkini);

        return $terkini;
    }

    public function statusPemilihan(): string
    {
        return (string) $this->ambil('status_pemilihan', 'berlangsung');
    }

    public function apakahPemilihanDibuka(): bool
    {
        return $this->statusPemilihan() === 'berlangsung';
    }

    protected function storeKey(): string
    {
        return 'cssmora_dummy_pengaturan_v1';
    }

    protected function defaultData(): array
    {
        return [
            'nama_pemilihan' => 'Pemilihan Ketua Umum CSSMoRA Periode 2026/2027',
            'nama_organisasi' => 'CSSMoRA',
            'deskripsi_hero' => 'Mari berpartisipasi dalam menentukan pemimpin terbaik untuk masa depan CSSMoRA yang lebih baik.',
            'teks_tombol' => 'Mulai Memilih',
            'judul_kandidat' => 'Daftar Kandidat',
            'deskripsi_kandidat' => 'Kenali visi dan misi para kandidat sebelum memberikan suara Anda.',
            'judul_pengumuman' => 'Pengumuman Terbaru',
            'judul_cta' => 'Suara Anda, Masa Depan CSSMoRA',
            'deskripsi_cta' => 'Bersama kita wujudkan organisasi yang lebih baik dan berdampak.',
            'tagline_footer' => 'Loyalitas Tanpa Batas',
            'link_tentang' => '',
            'link_bantuan' => '',
            'link_kontak' => '',
            'link_youtube' => '',
            'link_instagram' => '',
            'email_kontak' => '',
            'status_pemilihan' => 'berlangsung',
            'waktu_mulai' => '2026-11-25 08:00:00',
            'waktu_selesai' => '2026-11-26 17:00:00',
            'tampilkan_hasil_sementara' => false,
            'catatan_panitia' => 'Gunakan hak pilih Anda secara jujur, langsung, bebas, dan rahasia.',
        ];
    }
}
