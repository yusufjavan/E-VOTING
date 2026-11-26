<?php

namespace App\Services;

use App\Repositories\HasilSuaraRepository;
use App\Repositories\KandidatRepository;
use App\Repositories\PemilihRepository;
use App\Repositories\PengaturanRepository;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class PemungutanSuaraService
{
    public function __construct(
        private readonly PemilihRepository $pemilihRepository,
        private readonly KandidatRepository $kandidatRepository,
        private readonly PengaturanRepository $pengaturanRepository,
        private readonly HasilSuaraRepository $hasilSuaraRepository,
    ) {
    }

    /**
     * Proses pemberian suara secara aman di server:
     * 1. Validasi jadwal/status pemilihan dibuka.
     * 2. Validasi kandidat terdaftar dan aktif.
     * 3. Kunci atomik per pemilih agar satu pemilih hanya memiliki satu suara.
     * 4. Pisahkan pencatatan partisipasi pemilih dan penambahan suara anonim.
     */
    public function kirimSuara(int|string $pemilihId, int|string $kandidatId): void
    {
        if (! $this->pengaturanRepository->apakahPemilihanDibuka()) {
            throw new RuntimeException('Pemungutan suara sedang tidak dibuka.');
        }

        $kandidat = $this->kandidatRepository->cariById($kandidatId);
        if ($kandidat === null || ! (bool) ($kandidat['aktif'] ?? false)) {
            throw new RuntimeException('Kandidat yang dipilih tidak valid atau tidak aktif.');
        }

        $lock = Cache::store()->lock('pemungutan_suara_pemilih_'.sha1((string) $pemilihId), 10);

        if (! $lock->get()) {
            throw new RuntimeException('Permintaan suara sedang diproses. Silakan tunggu beberapa saat.');
        }

        try {
            $pemilih = $this->pemilihRepository->cariById($pemilihId);

            if ($pemilih === null || ! (bool) ($pemilih['status_aktif'] ?? false)) {
                throw new RuntimeException('Akun pemilih tidak terdaftar atau tidak aktif.');
            }

            if ($this->pemilihRepository->sudahMemilih($pemilihId)) {
                throw new RuntimeException('Anda sudah menggunakan hak pilih sebelumnya.');
            }

            if (! $this->pemilihRepository->tandaiSudahMemilih($pemilihId)) {
                throw new RuntimeException('Gagal memperbarui status partisipasi pemilih.');
            }

            // Penambahan suara dipanggil tanpa menyertakan identitas pemilih.
            $this->hasilSuaraRepository->tambahSuara($kandidat['id']);
        } finally {
            $lock->release();
        }
    }
}
