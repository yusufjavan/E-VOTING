<x-layouts.app title="Pilih Kandidat">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-primary-dark via-blue-900 to-primary-light py-12 text-white">
        <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-white/5"></div>
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-accent-lime/20">
                    <svg class="h-8 w-8 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <h1 class="font-serif text-3xl font-bold lg:text-4xl">Pilih Kandidat</h1>
                    <p class="mt-1 text-sm text-blue-200">Kenali visi, misi, dan program kerja dari setiap kandidat pasangan calon pemimpin CSSMoRA sebelum memberikan hak suara terbaik Anda.</p>
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
                            $waktuMulai = $election['waktu_mulai'] ?? null;
                            $waktuSelesai = $election['waktu_selesai'] ?? null;
                            $mulai = $waktuMulai ? \Carbon\Carbon::parse($waktuMulai) : null;
                            $selesai = $waktuSelesai ? \Carbon\Carbon::parse($waktuSelesai) : null;
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
                            $electionStatus = $election['status_pemilihan'] ?? 'belum';
                            $sLabel = match($electionStatus) {
                                'berlangsung' => ['text' => 'Berlangsung', 'color' => 'text-green-600', 'dot' => 'bg-green-500'],
                                'selesai' => ['text' => 'Selesai', 'color' => 'text-slate-600', 'dot' => 'bg-slate-400'],
                                default => ['text' => 'Belum Dimulai', 'color' => 'text-amber-600', 'dot' => 'bg-amber-400'],
                            };
                        @endphp
                        <p class="text-sm font-bold {{ $sLabel['color'] }} flex items-center">
                            <span class="mr-1.5 h-2 w-2 rounded-full {{ $sLabel['dot'] }}"></span>
                            {{ $sLabel['text'] }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Status Suara Anda</p>
                        @if($hasVoted)
                            <span class="rounded-full bg-green-100 border border-green-300 px-3 py-0.5 text-xs font-bold text-green-700">Sudah Memilih</span>
                        @else
                            <span class="rounded-full border border-slate-300 px-3 py-0.5 text-xs font-bold text-slate-700">Belum Memilih</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Voting Form --}}
    <form id="vote-form" method="POST" action="{{ route('pilih.store') }}">
        @csrf

        <section class="mx-auto max-w-5xl px-4 py-10">
            @if($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="grid gap-6 md:grid-cols-2">
                @foreach($candidates as $candidate)
                    @php $cId = $candidate['id']; @endphp
                    <div class="relative rounded-xl border-2 bg-white p-6 shadow-card transition candidate-card
                                {{ $hasVoted ? 'opacity-75 cursor-default border-blue-100' : 'cursor-pointer hover:border-blue-400 hover:shadow-lg border-blue-100' }}"
                         onclick="if(!{{ $hasVoted ? 'true' : 'false' }}) { document.getElementById('candidate-{{ $cId }}').checked = true; document.querySelectorAll('.candidate-card').forEach(c => c.classList.remove('border-blue-500','ring-2','ring-blue-200')); this.classList.add('border-blue-500','ring-2','ring-blue-200'); }">

                        {{-- Selection indicator --}}
                        <div class="absolute right-4 top-4">
                            <input type="radio" name="candidate_id" id="candidate-{{ $cId }}" value="{{ $cId }}"
                                   class="sr-only peer" {{ $hasVoted ? 'disabled' : '' }}>
                            <div class="flex h-7 w-7 items-center justify-center rounded-full border-2 border-slate-300 peer-checked:border-blue-500 peer-checked:bg-blue-500 transition">
                                <svg class="h-4 w-4 text-white hidden" id="check-{{ $cId }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            {{-- Nomor --}}
                            <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-accent-lime text-sm font-bold text-primary-dark">
                                {{ str_pad($candidate['nomor_urut'], 2, '0', STR_PAD_LEFT) }}
                            </div>

                            {{-- Photo --}}
                            <div class="h-28 w-28 flex-shrink-0 overflow-hidden rounded-xl bg-slate-200">
                                @if($candidate['foto_url'] ?? null)
                                    <img src="{{ $candidate['foto_url'] }}" alt="{{ $candidate['nama'] }}" class="h-full w-full object-cover">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200">
                                        <svg class="h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-slate-900">{{ $candidate['nama'] }}</h3>

                                <div class="mt-3">
                                    <p class="text-xs font-bold text-slate-700">
                                        <svg class="mr-1 inline h-3.5 w-3.5 text-accent-lime" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                        VISI
                                    </p>
                                    <p class="mt-0.5 text-xs text-slate-600 line-clamp-3">{{ $candidate['visi'] }}</p>
                                </div>

                                <div class="mt-2">
                                    <p class="text-xs font-bold text-slate-700">
                                        <svg class="mr-1 inline h-3.5 w-3.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                                        MISI
                                    </p>
                                    <p class="mt-0.5 text-xs text-slate-600 line-clamp-2">{{ $candidate['misi'][0] ?? '' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{ route('daftar-kandidat') }}" class="inline-flex items-center rounded-full border-2 border-blue-600 px-5 py-2 text-xs font-bold text-blue-600 hover:bg-blue-600 hover:text-white transition" onclick="event.stopPropagation()">
                                &#x1F4CB; Lihat Detail &rarr;
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Bottom Action Bar --}}
        <section class="border-t border-slate-200 bg-white">
            <div class="mx-auto max-w-5xl px-4 py-5">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full {{ $hasVoted ? 'bg-green-100' : 'bg-blue-100' }}">
                            @if($hasVoted)
                                <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            @else
                                <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                            @endif
                        </div>
                        <div>
                            @if($hasVoted)
                                <p class="text-sm font-bold text-slate-900">Terima kasih, suara Anda telah berhasil dicatat.</p>
                                <p class="text-xs text-slate-500">Anda telah menggunakan hak suara. Pilihan Anda bersifat final dan tidak dapat diubah.</p>
                            @else
                                <p class="text-sm font-bold text-slate-900">Pastikan Anda memilih satu kandidat sesuai hati nurani Anda.</p>
                                <p class="text-xs text-slate-500">Setelah tombol kirim ditekan, hak suara Anda bersifat final dan tidak dapat diubah kembali.</p>
                            @endif
                        </div>
                    </div>

                    @if($hasVoted)
                        <span class="inline-flex items-center rounded-full bg-green-100 border border-green-300 px-6 py-3 text-sm font-bold text-green-700">
                            Suara terkirim &rarr;
                        </span>
                    @else
                        <button type="submit" class="inline-flex items-center rounded-full bg-blue-600 px-6 py-3 text-sm font-bold text-white shadow hover:bg-blue-700 transition">
                            Kirim Suara &rarr;
                        </button>
                    @endif
                </div>
            </div>
        </section>
    </form>

    {{-- Success Modal --}}
    @if(session('pilihan'))
        @php $pilihan = session('pilihan'); @endphp
        <div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div class="mx-4 w-full max-w-md rounded-2xl bg-white p-8 text-center shadow-2xl">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                </div>

                <h3 class="mt-4 text-xl font-bold text-slate-900">Suara berhasil dikirim!</h3>
                <p class="mt-2 text-sm text-slate-500">Anda berhasil memberikan suara untuk kandidat:</p>

                <div class="mt-4 rounded-xl bg-yellow-50 border border-yellow-200 px-4 py-3">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Kandidat Nomor {{ str_pad($pilihan['nomor_urut'] ?? '', 2, '0', STR_PAD_LEFT) }}</p>
                    <p class="mt-1 text-lg font-bold text-blue-800">{{ $pilihan['nama'] ?? '' }}</p>
                </div>

                <p class="mt-4 text-xs text-slate-500">Terima kasih atas partisipasi Anda.<br>Suara yang telah dikirim tidak dapat diubah.</p>

                <button onclick="document.getElementById('success-modal').remove()" class="mt-6 w-full rounded-xl bg-blue-600 py-3 text-sm font-bold text-white hover:bg-blue-700 transition">
                    Selesai
                </button>
            </div>
        </div>
    @endif

    {{-- JS for radio button visual feedback --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="candidate_id"]');
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Reset all cards
                    document.querySelectorAll('.candidate-card').forEach(card => {
                        card.classList.remove('border-blue-500', 'ring-2', 'ring-blue-200');
                        card.classList.add('border-blue-100');
                    });
                    // Hide all checks
                    document.querySelectorAll('[id^="check-"]').forEach(c => c.classList.add('hidden'));

                    // Highlight selected
                    if (this.checked) {
                        this.closest('.candidate-card').classList.remove('border-blue-100');
                        this.closest('.candidate-card').classList.add('border-blue-500', 'ring-2', 'ring-blue-200');
                        const checkIcon = document.getElementById('check-' + this.value);
                        if (checkIcon) checkIcon.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
</x-layouts.app>
