<?php

namespace App\Repositories\Dummy;

use App\Repositories\Dummy\Concerns\UsesDummyStore;
use App\Repositories\HasilSuaraRepository;

class DummyHasilSuaraRepository implements HasilSuaraRepository
{
    use UsesDummyStore;

    public function semua(): array
    {
        return $this->loadStore();
    }

    public function suaraUntukKandidat(int|string $kandidatId): int
    {
        $suara = $this->loadStore();

        return (int) ($suara[(string) $kandidatId] ?? 0);
    }

    public function tambahSuara(int|string $kandidatId): int
    {
        $suara = $this->loadStore();
        $key = (string) $kandidatId;
        $suara[$key] = ((int) ($suara[$key] ?? 0)) + 1;
        $this->saveStore($suara);

        return $suara[$key];
    }

    public function totalSuaraMasuk(): int
    {
        return array_sum(array_map('intval', $this->loadStore()));
    }

    public function ringkasanHasil(array $kandidatList): array
    {
        $suara = $this->loadStore();
        $total = $this->totalSuaraMasuk();
        $ringkasan = [];

        foreach ($kandidatList as $kandidat) {
            $id = (string) $kandidat['id'];
            $jumlah = (int) ($suara[$id] ?? 0);
            $persentase = $total > 0 ? round(($jumlah / $total) * 100, 1) : 0.0;

            $ringkasan[] = [
                'kandidat_id' => $kandidat['id'],
                'nomor_urut' => $kandidat['nomor_urut'] ?? null,
                'nama' => $kandidat['nama'] ?? '',
                'jumlah_suara' => $jumlah,
                'persentase' => $persentase,
            ];
        }

        return $ringkasan;
    }

    protected function storeKey(): string
    {
        return 'cssmora_dummy_hasil_suara_v1';
    }

    protected function defaultData(): array
    {
        // Hanya menyimpan akumulasi suara anonim per ID kandidat.
        return [
            '1' => 1,
            '2' => 1,
            '3' => 0,
        ];
    }
}
