<?php

namespace App\Repositories\Dummy;

use App\Repositories\Dummy\Concerns\UsesDummyStore;
use App\Repositories\KandidatRepository;

class DummyKandidatRepository implements KandidatRepository
{
    use UsesDummyStore;

    public function semua(): array
    {
        $items = $this->loadStore();

        usort(
            $items,
            fn (array $a, array $b): int => ((int) ($a['nomor_urut'] ?? 0)) <=> ((int) ($b['nomor_urut'] ?? 0))
        );

        return array_values($items);
    }

    public function aktif(): array
    {
        return array_values(array_filter(
            $this->semua(),
            fn (array $kandidat): bool => (bool) ($kandidat['aktif'] ?? false)
        ));
    }

    public function cariById(int|string $id): ?array
    {
        foreach ($this->loadStore() as $kandidat) {
            if ((string) $kandidat['id'] === (string) $id) {
                return $kandidat;
            }
        }

        return null;
    }

    public function cariByNomorUrut(int $nomorUrut): ?array
    {
        foreach ($this->loadStore() as $kandidat) {
            if ((int) ($kandidat['nomor_urut'] ?? 0) === $nomorUrut) {
                return $kandidat;
            }
        }

        return null;
    }

    public function simpan(array $data): array
    {
        $items = $this->loadStore();

        $baru = [
            'id' => $this->nextId($items),
            'nomor_urut' => (int) ($data['nomor_urut'] ?? (count($items) + 1)),
            'nama' => (string) ($data['nama'] ?? ''),
            'angkatan' => (string) ($data['angkatan'] ?? ''),
            'fakultas' => (string) ($data['fakultas'] ?? ''),
            'tagline' => (string) ($data['tagline'] ?? ''),
            'foto_url' => $data['foto_url'] ?? null,
            'visi' => (string) ($data['visi'] ?? ''),
            'misi' => array_values((array) ($data['misi'] ?? [])),
            'program_unggulan' => array_values((array) ($data['program_unggulan'] ?? [])),
            'aktif' => (bool) ($data['aktif'] ?? true),
        ];

        $items[] = $baru;
        $this->saveStore($items);

        return $baru;
    }

    public function perbarui(int|string $id, array $data): ?array
    {
        $items = $this->loadStore();

        foreach ($items as $index => $kandidat) {
            if ((string) $kandidat['id'] === (string) $id) {
                $items[$index] = array_merge($kandidat, $data, ['id' => $kandidat['id']]);
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
            fn (array $kandidat): bool => (string) $kandidat['id'] !== (string) $id
        ));

        if (count($filtered) === count($items)) {
            return false;
        }

        $this->saveStore($filtered);

        return true;
    }

    protected function storeKey(): string
    {
        return 'cssmora_dummy_kandidat_v1';
    }

    protected function defaultData(): array
    {
        return [
            [
                'id' => 1,
                'nomor_urut' => 1,
                'nama' => 'Ahmad Fauzan Pratama',
                'angkatan' => '2023',
                'fakultas' => 'Fakultas Syariah dan Hukum',
                'tagline' => 'Sinergi Kaderisasi, Integritas Organisasi',
                'foto_url' => null,
                'visi' => 'Mewujudkan CSSMoRA yang kolaboratif, progresif, dan berakar kuat pada nilai kepesantrenan serta prestasi akademik.',
                'misi' => [
                    'Memperkuat program kaderisasi berjenjang dan pendampingan mahasantri baru.',
                    'Membangun pusat informasi beasiswa, riset, dan pengembangan karier alumni.',
                    'Mendorong tata kelola organisasi yang transparan dan akuntabel.',
                ],
                'program_unggulan' => [
                    'CSSMoRA Mentorship Hub',
                    'Forum Kajian Ilmiah & Keislaman Nusantara',
                    'Sistem Informasi Kader Terpadu',
                ],
                'aktif' => true,
            ],
            [
                'id' => 2,
                'nomor_urut' => 2,
                'nama' => 'Siti Nurhaliza Rahma',
                'angkatan' => '2023',
                'fakultas' => 'Fakultas Ilmu Tarbiyah dan Keguruan',
                'tagline' => 'Inklusif, Inovatif, Berdaya Saing Global',
                'foto_url' => null,
                'visi' => 'Menjadikan CSSMoRA sebagai ruang tumbuh yang inklusif bagi seluruh anggota dalam berkarya, mengabdi, dan berprestasi.',
                'misi' => [
                    'Mengoptimalkan kolaborasi antar-komisariat dan jejaring organisasi mahasiswa.',
                    'Menyelenggarakan inkubator kepemimpinan, kewirausahaan sosial, dan literasi digital.',
                    'Menghadirkan program pengabdian masyarakat berbasis potensi daerah asal mahasantri.',
                ],
                'program_unggulan' => [
                    'Akademi Kepemimpinan Mahasantri',
                    'CSSMoRA Mengabdi Lintas Daerah',
                    'Festival Karya & Beasiswa',
                ],
                'aktif' => true,
            ],
            [
                'id' => 3,
                'nomor_urut' => 3,
                'nama' => 'Muhammad Rizky Hidayat',
                'angkatan' => '2024',
                'fakultas' => 'Fakultas Sains dan Teknologi',
                'tagline' => 'Transformasi Digital & Gerakan Nyata',
                'foto_url' => null,
                'visi' => 'Membangun CSSMoRA yang adaptif terhadap perkembangan zaman dengan pelayanan anggota yang cepat, terbuka, dan berdampak.',
                'misi' => [
                    'Digitalisasi layanan administrasi, database karya, dan komunikasi internal.',
                    'Memperluas akses pelatihan teknologi, bahasa asing, dan penulisan ilmiah.',
                    'Menjaga solidaritas dan kesejahteraan anggota melalui forum aspirasi rutin.',
                ],
                'program_unggulan' => [
                    'Portal Layanan Anggota Satu Pintu',
                    'Klinik Riset & Publikasi Mahasantri',
                    'Ruang Aspirasi Terbuka Bulanan',
                ],
                'aktif' => true,
            ],
        ];
    }
}
