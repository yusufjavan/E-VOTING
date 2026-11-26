<?php

namespace App\Repositories;

interface PengaturanRepository
{
    /**
     * Ambil seluruh pengaturan pemilihan.
     *
     * @return array<string, mixed>
     */
    public function semua(): array;

    /**
     * Ambil nilai pengaturan tertentu berdasarkan kunci.
     */
    public function ambil(string $kunci, mixed $default = null): mixed;

    /**
     * Perbarui beberapa pengaturan sekaligus.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function perbaruiBanyak(array $data): array;

    /**
     * Ambil status pemilihan saat ini ('belum_dimulai', 'berlangsung', atau 'selesai').
     */
    public function statusPemilihan(): string;

    /**
     * Pastikan apakah pemungutan suara sedang dibuka untuk pemilih.
     */
    public function apakahPemilihanDibuka(): bool;
}
