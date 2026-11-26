<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Repositories\KandidatRepository;
use App\Repositories\PengaturanRepository;

class PilihController extends Controller
{
    protected $kandidatRepo;
    protected $pengaturanRepo;

    public function __construct(KandidatRepository $kandidatRepo, PengaturanRepository $pengaturanRepo)
    {
        $this->kandidatRepo   = $kandidatRepo;
        $this->pengaturanRepo = $pengaturanRepo;
    }

    /**
     * Tampilkan halaman pilih kandidat (demo tanpa login).
     */
    public function index()
    {
        // Demo: gunakan voter ID tetap 1
        $voterId  = 1; // TODO: ganti ke Auth::id() bila login diaktifkan
        $hasVoted = Cache::get("sudah_memilih.$voterId", false);

        $candidates = $this->kandidatRepo->semua();
        $election   = $this->pengaturanRepo->semua();

        return view('pilih.index', compact('candidates', 'election', 'hasVoted'));
    }

    /**
     * Proses pengiriman suara (demo, tidak menyimpan kandidat).
     */
    public function store(Request $request)
    {
        $voterId = 1; // TODO: Auth::id() ketika autentikasi dipakai
        $election = $this->pengaturanRepo->semua();

        // Pastikan pemilihan sedang berlangsung
        if (($election['status_pemilihan'] ?? '') !== 'berlangsung') {
            return back()->withErrors(['vote' => 'Pemilihan belum dibuka atau sudah selesai.']);
        }

        // Cek apakah sudah memilih
        if (Cache::has("sudah_memilih.$voterId")) {
            return back()->withErrors(['vote' => 'Anda sudah memilih sebelumnya.']);
        }

        // Validasi ID kandidat
        $validated = $request->validate([
            'candidate_id' => 'required|integer',
        ]);
        $candidateId = $validated['candidate_id'];

        $candidates = $this->kandidatRepo->semua();
        $candidate  = collect($candidates)->firstWhere('id', $candidateId);
        if (! $candidate) {
            return back()->withErrors(['vote' => 'Kandidat yang dipilih tidak valid.']);
        }

        // Simpan flag di cache (demo)
        Cache::put("sudah_memilih.$voterId", true, now()->addYears(10));

        // Simpan kandidat terpilih di flash session untuk modal satu kali pakai.
        Session::flash('pilihan', $candidate);

        return redirect()->route('pilih.index')->with('status', 'suara_terkirim');
    }
}
