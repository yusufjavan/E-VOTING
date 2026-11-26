<?php

namespace App\Repositories\Dummy;

use App\Repositories\Dummy\Concerns\UsesDummyStore;
use App\Repositories\PengumumanRepository;

class DummyPengumumanRepository implements PengumumanRepository
{
    use UsesDummyStore;

    public function semua(): array
    {
        $items = $this->loadStore();

        usort(
            $items,
            fn (array $a, array $b): int => strcmp((string) ($b['dipublikasikan_pada'] ?? ''), (string) ($a['dipublikasikan_pada'] ?? ''))
        );

        return array_values($items);
    }

    public function aktif(): array
    {
        return array_values(array_filter(
            $this->semua(),
            fn (array $pengumuman): bool => (bool) ($pengumuman['aktif'] ?? false)
        ));
    }

    public function cariById(int|string $id): ?array
    {
        foreach ($this->loadStore() as $pengumuman) {
            if ((string) $pengumuman['id'] === (string) $id) {
                return $pengumuman;
            }
        }

        return null;
    }

    public function simpan(array $data): array
    {
        $items = $this->loadStore();

        $baru = [
            'id' => $this->nextId($items),
            'judul' => (string) ($data['judul'] ?? ''),
            'isi' => (string) ($data['isi'] ?? ''),
            'kategori' => (string) ($data['kategori'] ?? 'Informasi'),
            'dipublikasikan_pada' => (string) ($data['dipublikasikan_pada'] ?? now()->toIso8601String()),
            'aktif' => (bool) ($data['aktif'] ?? true),
        ];

        $items[] = $baru;
        $this->saveStore($items);

        return $baru;
    }

    public function perbarui(int|string $id, array $data): ?array
    {
        $items = $this->loadStore();

        foreach ($items as $index => $pengumuman) {
            if ((string) $pengumuman['id'] === (string) $id) {
                $items[$index] = array_merge($pengumuman, $data, ['id' => $pengumuman['id']]);
                $this->saveStore($items);

                return $items[$index];
            }
        }

        return null;
    }

    public function hapus(int|string $id): bool
    {
        $items = $this->loadStore();
        $filtered = array_values(array_filter(
            $items,
            fn (array $pengumuman): bool => (string) $pengumuman['id'] !== (string) $id
        ));

        if (count($filtered) === count($items)) {
            return false;
        }

        $this->saveStore($filtered);

        return true;
    }

    protected function storeKey(): string
    {
        return 'cssmora_dummy_pengumuman_v1';
    }

    protected function defaultData(): array
    {
        return [
            [
                'id' => 1,
                'judul' => 'Pemungutan Suara Resmi Dibuka',
                'isi' => 'Pemilihan Ketua Umum CSSMoRA telah dibuka. Pastikan Anda membaca visi dan misi setiap kandidat sebelum memberikan suara.',
                'kategori' => 'Penting',
                'dipublikasikan_pada' => '2026-11-25T08:00:00+07:00',
                'aktif' => true,
            ],
            [
                'id' => 2,
                'judul' => 'Panduan Kerahasiaan dan Keamanan Suara',
                'isi' => 'Setiap pemilih hanya memiliki satu kesempatan memilih. Pilihan Anda bersifat rahasia dan tidak terhubung dengan identitas akun.',
                'kategori' => 'Informasi',
                'dipublikasikan_pada' => '2026-11-24T19:30:00+07:00',
                'aktif' => true,
            ],
        ];
    }
}
