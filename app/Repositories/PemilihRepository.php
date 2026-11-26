<?php

namespace App\Repositories;

interface PemilihRepository
{
    /**
     * Ambil seluruh data pemilih tanpa kredensial sensitif maupun pilihan suara.
     *
     * @return array<int, array<string, mixed>>
     */
    public function semua(): array;

    /**
     * Cari pemilih berdasarkan ID.
     *
     * @return array<string, mixed>|null
     */
    public function cariById(int|string $id): ?array;

    /**
     * Cari pemilih berdasarkan NIM atau email.
     *
     * @return array<string, mixed>|null
     */
    public function cariByIdentifier(string $identifier): ?array;

    /**
     * Verifikasi kredensial pemilih (NIM/email dan kode akses).
     * Mengembalikan data pemilih aman (tanpa kode akses) jika valid.
     *
     * @return array<string, mixed>|null
     */
    public function verifikasiKredensial(string $identifier, string $kodeAkses): ?array;

    /**
     * Periksa apakah pemilih sudah menggunakan hak pilihnya.
     */
    public function sudahMemilih(int|string $pemilihId): bool;

    /**
     * Tandai bahwa pemilih sudah menggunakan hak pilihnya.
     * Secara kontrak tidak menerima pilihan kandidat demi menjaga kerahasiaan suara.
     */
    public function tandaiSudahMemilih(int|string $pemilihId): bool;

    /**
     * Hitung ringkasan partisipasi pemilih.
     *
     * @return array{total_pemilih: int, sudah_memilih: int, belum_memilih: int, persentase: float}
     */
    public function statistikPartisipasi(): array;

    /**
     * Tambah data pemilih baru.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function simpan(array $data): array;

    /**
     * Perbarui data pemilih.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>|null
     */
    public function perbarui(int|string $id, array $data): ?array;

    /**
     * Hapus data pemilih berdasarkan ID.
     */
    public function hapus(int|string $id): bool;
}
