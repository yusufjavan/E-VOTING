<?php

namespace App\Repositories;

interface HasilSuaraRepository
{
    /**
     * Ambil seluruh akumulasi suara anonim per kandidat.
     *
     * @return array<int|string, int>
     */
    public function semua(): array;

    /**
     * Ambil jumlah suara untuk satu kandidat.
     */
    public function suaraUntukKandidat(int|string $kandidatId): int;

    /**
     * Tambahkan satu suara anonim untuk kandidat terpilih.
     * Secara kontrak tidak menerima ID pemilih demi menjaga kerahasiaan suara.
     */
    public function tambahSuara(int|string $kandidatId): int;

    /**
     * Hitung total seluruh suara masuk.
     */
    public function totalSuaraMasuk(): int;

    /**
     * Susun ringkasan hasil perolehan suara berdasarkan daftar kandidat.
     *
     * @param  array<int, array<string, mixed>>  $kandidatList
     * @return array<int, array<string, mixed>>
     */
    public function ringkasanHasil(array $kandidatList): array;
}
