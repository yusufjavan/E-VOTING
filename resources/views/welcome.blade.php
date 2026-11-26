<x-layouts.app title="Beranda">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-dark via-blue-900 to-primary-light py-16 text-white">
        <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-white/5"></div>
        <div class="absolute -left-10 bottom-0 h-60 w-60 rounded-full bg-white/5"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                <div>
                    @if($statusPemilihan === 'berlangsung')
                        <span class="inline-flex items-center rounded-full bg-green-500/20 px-3 py-1 text-xs font-semibold text-green-300 ring-1 ring-green-400/30">
                            <span class="mr-1.5 h-2 w-2 rounded-full bg-green-400 animate-pulse"></span>
                            Pemilihan Sedang Berlangsung
                        </span>
                    @endif

                    <h1 class="mt-4 font-serif text-4xl font-bold leading-tight lg:text-5xl">
                        {{ $pengaturan['nama_pemilihan'] ?? 'Pemilihan Ketua CSSMoRA' }}
                    </h1>

                    <p class="mt-4 text-lg text-blue-200">
                        Mari berpartisipasi dalam menentukan pemimpin terbaik untuk masa depan CSSMoRA yang lebih baik.
                    </p>

                    <a href="{{ route('pilih.index') }}" class="mt-6 inline-flex items-center rounded-full bg-accent-lime px-6 py-3 text-sm font-bold text-primary-dark shadow-lg hover:bg-lime-400 transition">
                        <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                        Mulai Memilih &rarr;
                    </a>
                </div>

                <div class="hidden lg:flex items-center justify-center">
                    <div class="relative">
                        <div class="flex h-32 w-32 items-center justify-center rounded-2xl bg-accent-lime/20 shadow-2xl">
                            <svg class="h-16 w-16 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div class="absolute -bottom-8 -right-8 flex h-24 w-24 items-center justify-center rounded-xl bg-blue-800/50 backdrop-blur">
                            <div class="text-center">
                                <svg class="mx-auto h-8 w-8 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21" /></svg>
                                <p class="mt-1 text-[10px] font-bold uppercase tracking-wider">CSSMoRA 2027</p>
                            </div>
                        </div>
                        <p class="mt-12 text-center text-xs font-bold uppercase tracking-widest text-blue-300">Satu Anggota / Satu Suara</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-accent-lime via-green-400 to-accent-lime"></div>
    </section>

    {{-- Status Bar --}}
    <section class="relative z-10 mx-auto -mt-6 max-w-5xl px-4">
        <div class="rounded-xl border border-slate-200 bg-white px-6 py-4 shadow-card">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="flex items-center space-x-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Periode Pemilihan</p>
                        @php
                            $mulai = isset($pengaturan['waktu_mulai']) ? \Carbon\Carbon::parse($pengaturan['waktu_mulai']) : null;
                            $selesai = isset($pengaturan['waktu_selesai']) ? \Carbon\Carbon::parse($pengaturan['waktu_selesai']) : null;
                        @endphp
                        <p class="text-sm font-bold text-slate-900">
                            @if($mulai && $selesai)
                                {{ $mulai->translatedFormat('d M Y') }} &ndash; {{ $selesai->translatedFormat('d M Y') }}
                                <span class="text-xs font-normal text-slate-500">({{ $mulai->format('H.i') }} &ndash; {{ $selesai->format('H.i') }})</span>
                            @else
                                Belum ditentukan
                            @endif
                        </p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Status Pemilihan</p>
                        @php
                            $statusLabel = match($statusPemilihan) {
                                'berlangsung' => ['text' => 'Berlangsung', 'color' => 'text-green-600', 'dot' => 'bg-green-500'],
                                'selesai' => ['text' => 'Selesai', 'color' => 'text-slate-600', 'dot' => 'bg-slate-400'],
                                default => ['text' => 'Belum Dimulai', 'color' => 'text-amber-600', 'dot' => 'bg-amber-400'],
                            };
                        @endphp
                        <p class="text-sm font-bold {{ $statusLabel['color'] }} flex items-center">
                            <span class="mr-1.5 h-2 w-2 rounded-full {{ $statusLabel['dot'] }}"></span>
                            {{ $statusLabel['text'] }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Status Suara Anda</p>
                        <span class="rounded-full border border-slate-300 px-3 py-0.5 text-xs font-bold text-slate-700">Belum Memilih</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Daftar Kandidat Preview --}}
    <section class="mx-auto max-w-5xl px-4 py-12">
        <div class="mb-8 text-center">
            <div class="flex items-center justify-center space-x-2">
                <div class="h-px w-12 bg-accent-lime"></div>
                <h2 class="text-2xl font-bold text-slate-900">Daftar Kandidat</h2>
                <div class="h-px w-12 bg-accent-lime"></div>
            </div>
            <p class="mt-2 text-sm text-slate-500">Kenali visi dan misi para kandidat sebelum memberikan suara Anda.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            @foreach($kandidatAktif as $kandidat)
                <div class="group rounded-xl border-2 border-blue-100 bg-white p-6 shadow-card transition hover:border-blue-400 hover:shadow-lg">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-accent-lime text-sm font-bold text-primary-dark">
                                {{ str_pad($kandidat['nomor_urut'], 2, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="flex-shrink-0">
                            <div class="h-24 w-24 overflow-hidden rounded-xl bg-slate-200">
                                @if($kandidat['foto_url'])
                                    <img src="{{ $kandidat['foto_url'] }}" alt="{{ $kandidat['nama'] }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                        <svg class="h-10 w-10 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-bold text-slate-900">{{ $kandidat['nama'] }}</h3>
                            <p class="text-xs text-blue-600 font-semibold">Calon Ketua & Wakil Ketua</p>
                            <p class="mt-1 text-xs italic text-slate-500">"{{ $kandidat['tagline'] }}"</p>

                            <div class="mt-3">
                                <p class="text-xs font-bold text-slate-700">
                                    <svg class="mr-1 inline h-3.5 w-3.5 text-accent-lime" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    VISI
                                </p>
                                <p class="mt-0.5 text-xs text-slate-600 line-clamp-2">{{ $kandidat['visi'] }}</p>
                            </div>

                            <div class="mt-2">
                                <p class="text-xs font-bold text-slate-700">
                                    <svg class="mr-1 inline h-3.5 w-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                    MISI
                                </p>
                                <p class="mt-0.5 text-xs text-slate-600 line-clamp-2">{{ $kandidat['misi'][0] ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('daftar-kandidat') }}" class="inline-flex items-center rounded-full border-2 border-blue-600 px-5 py-2 text-xs font-bold text-blue-600 hover:bg-blue-600 hover:text-white transition">
                            Lihat Detail &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Pengumuman + CTA --}}
    <section class="mx-auto max-w-5xl px-4 pb-12">
        <div class="grid gap-6 lg:grid-cols-2">
            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="flex items-center text-lg font-bold text-slate-900">
                        <svg class="mr-2 h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" /></svg>
                        Pengumuman Terbaru
                    </h3>
                    <a href="#" class="text-xs font-semibold text-blue-600 hover:underline">Lihat Semua &rarr;</a>
                </div>
                <div class="space-y-3">
                    @forelse($pengumumanAktif as $pengumuman)
                        <div class="flex items-start space-x-3">
                            <span class="mt-1.5 h-2 w-2 flex-shrink-0 rounded-full bg-blue-500"></span>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $pengumuman['judul'] }}</p>
                                <p class="text-xs text-slate-500">{{ \Carbon\Carbon::parse($pengumuman['dipublikasikan_pada'])->translatedFormat('d M Y') }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500">Belum ada pengumuman.</p>
                    @endforelse
                </div>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-primary-dark to-blue-800 p-8 text-white shadow-card">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/5"></div>
                <div class="relative">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-accent-lime/20 mb-4">
                        <svg class="h-6 w-6 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold">Suara Anda, Masa Depan CSSMoRA</h3>
                    <p class="mt-2 text-sm text-blue-200">Bersama kita wujudkan organisasi yang lebih baik dan berdampak.</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
