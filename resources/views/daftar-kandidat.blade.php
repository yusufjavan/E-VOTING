<x-layouts.app title="Daftar Kandidat">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-dark via-blue-900 to-primary-light py-12 text-white">
        <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-white/5"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-accent-lime/20">
                    <svg class="h-8 w-8 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                </div>
                <div>
                    <h1 class="font-serif text-3xl font-bold lg:text-4xl">Daftar Kandidat</h1>
                    <p class="mt-1 text-sm text-blue-200">Kenali visi, misi, dan program kerja dari setiap kandidat sebelum memberikan suara Anda.</p>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-accent-lime via-green-400 to-accent-lime"></div>
    </section>

    {{-- Status Bar --}}
    <section class="relative z-10 mx-auto -mt-6 max-w-6xl px-4">
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

    {{-- Kandidat Detail Cards --}}
    <section class="mx-auto max-w-6xl px-4 py-10">
        <div class="grid gap-8 lg:grid-cols-2">
            @foreach($kandidat as $k)
                <div class="rounded-2xl border-2 border-blue-200 bg-white shadow-card overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-accent-lime text-lg font-bold text-primary-dark">
                                {{ str_pad($k['nomor_urut'], 2, '0', STR_PAD_LEFT) }}
                            </div>
                            <div class="h-28 w-28 flex-shrink-0 overflow-hidden rounded-xl bg-slate-200">
                                @if($k['foto_url'])
                                    <img src="{{ $k['foto_url'] }}" alt="{{ $k['nama'] }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                        <svg class="h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="inline-block rounded bg-accent-lime/20 px-2 py-0.5 text-[10px] font-bold text-green-700">Calon Ketua & Wakil Ketua</span>
                                <h3 class="mt-1 text-xl font-bold text-slate-900">{{ $k['nama'] }}</h3>
                                <p class="mt-1 text-xs italic text-blue-600">"{{ $k['tagline'] }}"</p>
                                <p class="mt-2 text-xs text-slate-600">
                                    <span class="font-semibold text-blue-800">{{ $k['nama'] }}:</span> {{ $k['fakultas'] }} ({{ $k['angkatan'] }})
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mx-6 rounded-xl border border-blue-100 bg-blue-50/50 p-4">
                        <h4 class="flex items-center text-xs font-bold uppercase tracking-wider text-blue-700">
                            <svg class="mr-1.5 h-4 w-4 text-accent-lime" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                            Visi Utama
                        </h4>
                        <p class="mt-2 text-sm text-slate-700 leading-relaxed">"{{ $k['visi'] }}"</p>
                    </div>

                    <div class="p-6">
                        <h4 class="flex items-center text-xs font-bold uppercase tracking-wider text-slate-700">
                            <svg class="mr-1.5 h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                            Misi Komprehensif
                        </h4>
                        <ol class="mt-3 space-y-2">
                            @foreach($k['misi'] as $i => $misi)
                                <li class="flex items-start space-x-2 text-sm text-slate-600">
                                    <span class="mt-0.5 flex h-5 w-5 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 text-[10px] font-bold text-blue-700">{{ $i + 1 }}</span>
                                    <span>{{ $misi }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                    <div class="border-t border-slate-100 p-6">
                        <h4 class="flex items-center text-xs font-bold uppercase tracking-wider text-slate-700">
                            <svg class="mr-1.5 h-4 w-4 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456z" /></svg>
                            3 Program Kerja Unggulan
                        </h4>
                        <div class="mt-3 space-y-2">
                            @foreach($k['program_unggulan'] as $program)
                                <div class="flex items-start space-x-3 rounded-lg border border-slate-100 bg-slate-50 p-3">
                                    <div class="mt-0.5 flex h-6 w-6 flex-shrink-0 items-center justify-center rounded-lg bg-blue-100">
                                        <svg class="h-3.5 w-3.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" /></svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-700">{{ $program }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Bottom CTA --}}
    <section class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-accent-lime/20">
                        <svg class="h-5 w-5 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-slate-900">Pastikan Anda memilih satu kandidat sesuai hati nurani Anda.</p>
                        <p class="text-xs text-slate-500">Setelah memilih, suara Anda tidak dapat diubah.</p>
                    </div>
                </div>
                <a href="{{ route('pilih.index') }}" class="inline-flex items-center rounded-full bg-accent-lime px-6 py-3 text-sm font-bold text-primary-dark shadow hover:bg-lime-400 transition">
                    Pilih Kandidat Sekarang &rarr;
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
