<?php

namespace App\Http\Controllers;

use App\Repositories\KandidatRepository;
use App\Repositories\PengaturanRepository;
use Illuminate\Contracts\View\View;

class DaftarKandidatController extends Controller
{
    public function __construct(
        private readonly PengaturanRepository $pengaturanRepository,
        private readonly KandidatRepository $kandidatRepository,
    ) {
    }

    public function __invoke(): View
    {
        return view('daftar-kandidat', [
            'kandidat' => $this->kandidatRepository->aktif(),
            'pengaturan' => $this->pengaturanRepository->semua(),
            'statusPemilihan' => $this->pengaturanRepository->statusPemilihan(),
        ]);
    }
}
