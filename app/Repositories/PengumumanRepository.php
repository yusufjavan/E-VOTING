<?php

namespace App\Repositories;

interface PengumumanRepository
{
    /**
     * Ambil seluruh pengumuman terurut dari terbaru.
     *
     * @return array<int, array<string, mixed>>
     */
    public function semua(): array;

    /**
     * Ambil pengumuman yang dipublikasikan untuk portal pemilih.
     *
     * @return array<int, array<string, mixed>>
     */
    public function aktif(): array;

    /**
     * Cari pengumuman berdasarkan ID.
     *
     * @return array<string, mixed>|null
     */
    public function cariById(int|string $id): ?array;

    /**
     * Simpan pengumuman baru.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function simpan(array $data): array;

    /**
     * Perbarui pengumuman.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>|null
     */
    public function perbarui(int|string $id, array $data): ?array;

    /**
     * Hapus pengumuman berdasarkan ID.
     */
    public function hapus(int|string $id): bool;
}
