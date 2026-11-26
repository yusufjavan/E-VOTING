<?php

namespace Tests\Feature;

use App\Repositories\HasilSuaraRepository;
use App\Repositories\PemilihRepository;
use App\Repositories\PengaturanRepository;
use App\Services\PemungutanSuaraService;
use RuntimeException;
use Tests\TestCase;

class PemungutanSuaraSecurityTest extends TestCase
{
    public function test_satu_pemilih_hanya_satu_suara_dan_suara_tetap_anonim(): void
    {
        $service = app(PemungutanSuaraService::class);
        $pemilihRepo = app(PemilihRepository::class);
        $hasilRepo = app(HasilSuaraRepository::class);

        $awalSuaraKandidat3 = $hasilRepo->suaraUntukKandidat(3);
        $this->assertFalse($pemilihRepo->sudahMemilih(1));

        $service->kirimSuara(1, 3);

        $this->assertTrue($pemilihRepo->sudahMemilih(1));
        $this->assertSame($awalSuaraKandidat3 + 1, $hasilRepo->suaraUntukKandidat(3));

        $pemilih = $pemilihRepo->cariById(1);
        $this->assertNotNull($pemilih);
        $this->assertArrayNotHasKey('kandidat_id', $pemilih);
        $this->assertArrayNotHasKey('pilihan', $pemilih);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('sudah menggunakan hak pilih');
        $service->kirimSuara(1, 3);
    }

    public function test_suara_ditolak_saat_pemilihan_ditutup(): void
    {
        $pengaturanRepo = app(PengaturanRepository::class);
        $pengaturanRepo->perbaruiBanyak(['status_pemilihan' => 'selesai']);

        $service = app(PemungutanSuaraService::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('tidak dibuka');
        $service->kirimSuara(4, 1);
    }

    public function test_pemilih_nonaktif_ditolak(): void
    {
        $service = app(PemungutanSuaraService::class);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('tidak aktif');
        $service->kirimSuara(5, 1);
    }
}
