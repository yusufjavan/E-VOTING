<?php

namespace App\Repositories;

interface KandidatRepository
{
    /**
     * Ambil seluruh data kandidat terurut berdasarkan nomor urut.
     *
     * @return array<int, array<string, mixed>>
     */
    public function semua(): array;

    /**
     * Ambil daftar kandidat yang berstatus aktif.
     *
     * @return array<int, array<string, mixed>>
     */
    public function aktif(): array;

    /**
     * Cari kandidat berdasarkan ID.
     *
     * @return array<string, mixed>|null
     */
    public function cariById(int|string $id): ?array;

    /**
     * Cari kandidat berdasarkan nomor urut.
     *
     * @return array<string, mixed>|null
     */
    public function cariByNomorUrut(int $nomorUrut): ?array;

    /**
     * Simpan kandidat baru.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function simpan(array $data): array;

    /**
     * Perbarui data kandidat.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>|null
     */
    public function perbarui(int|string $id, array $data): ?array;

    /**
     * Hapus kandidat berdasarkan ID.
     */
    public function hapus(int|string $id): bool;
}
