<?php

namespace App\Repositories\Dummy;

use App\Repositories\Dummy\Concerns\UsesDummyStore;
use App\Repositories\PemilihRepository;

class DummyPemilihRepository implements PemilihRepository
{
    use UsesDummyStore;

    public function semua(): array
    {
        return array_values(array_map(
            fn (array $pemilih): array => $this->sanitize($pemilih),
            $this->loadStore()
        ));
    }

    public function cariById(int|string $id): ?array
    {
        foreach ($this->loadStore() as $pemilih) {
            if ((string) $pemilih['id'] === (string) $id) {
                return $this->sanitize($pemilih);
            }
        }

        return null;
    }

    public function cariByIdentifier(string $identifier): ?array
    {
        $normalized = mb_strtolower(trim($identifier));

        foreach ($this->loadStore() as $pemilih) {
            $nim = mb_strtolower((string) ($pemilih['nim'] ?? ''));
            $email = mb_strtolower((string) ($pemilih['email'] ?? ''));

            if ($normalized !== '' && ($nim === $normalized || $email === $normalized)) {
                return $this->sanitize($pemilih);
            }
        }

        return null;
    }

    public function verifikasiKredensial(string $identifier, string $kodeAkses): ?array
    {
        $normalized = mb_strtolower(trim($identifier));
        $inputHash = hash('sha256', trim($kodeAkses));

        foreach ($this->loadStore() as $pemilih) {
            $nim = mb_strtolower((string) ($pemilih['nim'] ?? ''));
            $email = mb_strtolower((string) ($pemilih['email'] ?? ''));

            if ($normalized === '' || ($nim !== $normalized && $email !== $normalized)) {
                continue;
            }

            if (! (bool) ($pemilih['status_aktif'] ?? false)) {
                return null;
            }

            $storedHash = (string) ($pemilih['kode_akses_hash'] ?? '');
            if ($storedHash !== '' && hash_equals($storedHash, $inputHash)) {
                return $this->sanitize($pemilih);
            }
        }

        return null;
    }

    public function sudahMemilih(int|string $pemilihId): bool
    {
        foreach ($this->loadStore() as $pemilih) {
            if ((string) $pemilih['id'] === (string) $pemilihId) {
                return (bool) ($pemilih['sudah_memilih'] ?? false);
            }
        }

        return false;
    }

    public function tandaiSudahMemilih(int|string $pemilihId): bool
    {
        $items = $this->loadStore();

        foreach ($items as $index => $pemilih) {
            if ((string) $pemilih['id'] === (string) $pemilihId) {
                if ((bool) ($pemilih['sudah_memilih'] ?? false)) {
                    return false;
                }

                // Catat status partisipasi saja; tidak ada referensi ke kandidat terpilih.
                $items[$index]['sudah_memilih'] = true;
                $items[$index]['waktu_memilih'] = now()->toIso8601String();
                $this->saveStore($items);

                return true;
            }
        }

        return false;
    }

    public function statistikPartisipasi(): array
    {
        $items = array_filter(
            $this->loadStore(),
            fn (array $pemilih): bool => (bool) ($pemilih['status_aktif'] ?? false)
        );

        $total = count($items);
        $sudah = count(array_filter(
            $items,
            fn (array $pemilih): bool => (bool) ($pemilih['sudah_memilih'] ?? false)
        ));
        $belum = max(0, $total - $sudah);
        $persentase = $total > 0 ? round(($sudah / $total) * 100, 1) : 0.0;

        return [
            'total_pemilih' => $total,
            'sudah_memilih' => $sudah,
            'belum_memilih' => $belum,
            'persentase' => $persentase,
        ];
    }

    public function simpan(array $data): array
    {
        $items = $this->loadStore();
        $kodeAkses = (string) ($data['kode_akses'] ?? 'CSSMORA2026');

        $baru = [
            'id' => $this->nextId($items),
            'nim' => (string) ($data['nim'] ?? ''),
            'nama' => (string) ($data['nama'] ?? ''),
            'email' => (string) ($data['email'] ?? ''),
            'angkatan' => (string) ($data['angkatan'] ?? ''),
            'status_aktif' => (bool) ($data['status_aktif'] ?? true),
            'sudah_memilih' => false,
            'waktu_memilih' => null,
            'kode_akses_hash' => hash('sha256', trim($kodeAkses)),
        ];

        $items[] = $baru;
        $this->saveStore($items);

        return $this->sanitize($baru);
    }

    public function perbarui(int|string $id, array $data): ?array
    {
        $items = $this->loadStore();

        foreach ($items as $index => $pemilih) {
            if ((string) $pemilih['id'] === (string) $id) {
                $allowed = array_intersect_key($data, array_flip([
                    'nim',
                    'nama',
                    'email',
                    'angkatan',
                    'status_aktif',
                ]));

                if (isset($data['kode_akses']) && trim((string) $data['kode_akses']) !== '') {
                    $allowed['kode_akses_hash'] = hash('sha256', trim((string) $data['kode_akses']));
                }

                $items[$index] = array_merge($pemilih, $allowed);
                $this->saveStore($items);

                return $this->sanitize($items[$index]);
            }
        }

        return null;
    }

    public function hapus(int|string $id): bool
    {
        $items = $this->loadStore();
        $filtered = array_values(array_filter(
            $items,
            fn (array $pemilih): bool => (string) $pemilih['id'] !== (string) $id
        ));

        if (count($filtered) === count($items)) {
            return false;
        }

        $this->saveStore($filtered);

        return true;
    }

    /**
     * Hapus field kredensial internal sebelum data keluar dari repository.
     *
     * @param  array<string, mixed>  $pemilih
     * @return array<string, mixed>
     */
    protected function sanitize(array $pemilih): array
    {
        unset($pemilih['kode_akses_hash']);

        return $pemilih;
    }

    protected function storeKey(): string
    {
        return 'cssmora_dummy_pemilih_v1';
    }

    protected function defaultData(): array
    {
        return [
            [
                'id' => 1,
                'nim' => '202301001',
                'nama' => 'Nadia Kusuma Putri',
                'email' => 'nadia.kusuma@cssmora.test',
                'angkatan' => '2023',
                'status_aktif' => true,
                'sudah_memilih' => false,
                'waktu_memilih' => null,
                'kode_akses_hash' => hash('sha256', 'TOKEN-1001'),
            ],
            [
                'id' => 2,
                'nim' => '202301002',
                'nama' => 'Bagas Ramadhan',
                'email' => 'bagas.ramadhan@cssmora.test',
                'angkatan' => '2023',
                'status_aktif' => true,
                'sudah_memilih' => true,
                'waktu_memilih' => '2026-11-25T09:15:00+07:00',
                'kode_akses_hash' => hash('sha256', 'TOKEN-1002'),
            ],
            [
                'id' => 3,
                'nim' => '202401003',
                'nama' => 'Aisyah Zahra',
                'email' => 'aisyah.zahra@cssmora.test',
                'angkatan' => '2024',
                'status_aktif' => true,
                'sudah_memilih' => true,
                'waktu_memilih' => '2026-11-25T10:02:00+07:00',
                'kode_akses_hash' => hash('sha256', 'TOKEN-1003'),
            ],
            [
                'id' => 4,
                'nim' => '202401004',
                'nama' => 'Dimas Saputra',
                'email' => 'dimas.saputra@cssmora.test',
                'angkatan' => '2024',
                'status_aktif' => true,
                'sudah_memilih' => false,
                'waktu_memilih' => null,
                'kode_akses_hash' => hash('sha256', 'TOKEN-1004'),
            ],
            [
                'id' => 5,
                'nim' => '202501005',
                'nama' => 'Hana Pertiwi',
                'email' => 'hana.pertiwi@cssmora.test',
                'angkatan' => '2025',
                'status_aktif' => false,
                'sudah_memilih' => false,
                'waktu_memilih' => null,
                'kode_akses_hash' => hash('sha256', 'TOKEN-1005'),
            ],
        ];
    }
}
