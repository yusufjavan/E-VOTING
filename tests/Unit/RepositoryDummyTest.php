<?php

namespace Tests\Unit;

use App\Repositories\Dummy\DummyHasilSuaraRepository;
use App\Repositories\Dummy\DummyKandidatRepository;
use App\Repositories\Dummy\DummyPemilihRepository;
use App\Repositories\Dummy\DummyPengaturanRepository;
use App\Repositories\Dummy\DummyPengumumanRepository;
use App\Repositories\HasilSuaraRepository;
use App\Repositories\KandidatRepository;
use App\Repositories\PemilihRepository;
use App\Repositories\PengaturanRepository;
use App\Repositories\PengumumanRepository;
use Tests\TestCase;

class RepositoryDummyTest extends TestCase
{
    public function test_seluruh_interface_repository_terikat_ke_implementasi_dummy(): void
    {
        $this->assertInstanceOf(DummyKandidatRepository::class, app(KandidatRepository::class));
        $this->assertInstanceOf(DummyPemilihRepository::class, app(PemilihRepository::class));
        $this->assertInstanceOf(DummyPengaturanRepository::class, app(PengaturanRepository::class));
        $this->assertInstanceOf(DummyPengumumanRepository::class, app(PengumumanRepository::class));
        $this->assertInstanceOf(DummyHasilSuaraRepository::class, app(HasilSuaraRepository::class));
    }

    public function test_data_pemilih_tidak_memuat_kredensial_atau_pilihan_suara(): void
    {
        $pemilihRepo = app(PemilihRepository::class);
        $daftar = $pemilihRepo->semua();

        $this->assertNotEmpty($daftar);

        foreach ($daftar as $pemilih) {
            $this->assertArrayNotHasKey('kode_akses_hash', $pemilih);
            $this->assertArrayNotHasKey('kandidat_id', $pemilih);
            $this->assertArrayNotHasKey('pilihan', $pemilih);
        }
    }

    public function test_verifikasi_kredensial_pemilih_berfungsi_dengan_benar(): void
    {
        $pemilihRepo = app(PemilihRepository::class);

        $valid = $pemilihRepo->verifikasiKredensial('202301001', 'TOKEN-1001');
        $this->assertNotNull($valid);
        $this->assertSame('Nadia Kusuma Putri', $valid['nama']);
        $this->assertArrayNotHasKey('kode_akses_hash', $valid);

        $salahToken = $pemilihRepo->verifikasiKredensial('202301001', 'SALAH');
        $this->assertNull($salahToken);

        $nonAktif = $pemilihRepo->verifikasiKredensial('202501005', 'TOKEN-1005');
        $this->assertNull($nonAktif);
    }
}
