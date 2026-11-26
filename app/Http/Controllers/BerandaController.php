<?php

namespace App\Http\Controllers;

use App\Repositories\KandidatRepository;
use App\Repositories\PengaturanRepository;
use App\Repositories\PengumumanRepository;
use Illuminate\Contracts\View\View;

class BerandaController extends Controller
{
    public function __construct(
        private readonly PengaturanRepository $pengaturanRepository,
        private readonly KandidatRepository $kandidatRepository,
        private readonly PengumumanRepository $pengumumanRepository,
    ) {
    }

    public function __invoke(): View
    {
        return view('welcome', [
            'pengaturan' => $this->pengaturanRepository->semua(),
            'statusPemilihan' => $this->pengaturanRepository->statusPemilihan(),
            'kandidatAktif' => $this->kandidatRepository->aktif(),
            'pengumumanAktif' => $this->pengumumanRepository->aktif(),
        ]);
    }
}
