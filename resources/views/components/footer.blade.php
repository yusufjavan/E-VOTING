<footer class="bg-primary-dark text-white mt-auto">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between py-6 space-y-4 md:space-y-0">
            {{-- Left: Logo + Tagline --}}
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10">
                        <svg class="h-5 w-5 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold leading-tight">{{ $siteSettings['nama_organisasi'] ?? 'CSSMoRA' }}</p>
                        <p class="text-[9px] uppercase tracking-wider text-blue-300">E-Voting Portal</p>
                    </div>
                </div>
                <div class="hidden sm:block h-6 w-px bg-white/20"></div>
                <p class="hidden sm:block font-serif italic text-sm text-blue-200">{{ $siteSettings['tagline_footer'] ?? 'Loyalitas Tanpa Batas' }}</p>
            </div>

            {{-- Center: Links --}}
            <div class="flex items-center space-x-4 text-xs text-blue-200">
                <a href="{{ ($siteSettings['link_tentang'] ?? '') ?: '#' }}" class="hover:text-white transition">Tentang CSSMoRA</a>
                <span class="text-white/30">|</span>
                <a href="{{ ($siteSettings['link_bantuan'] ?? '') ?: '#' }}" class="hover:text-white transition">Bantuan</a>
                <span class="text-white/30">|</span>
                <a href="{{ ($siteSettings['link_kontak'] ?? '') ?: (! empty($siteSettings['email_kontak']) ? 'mailto:'.$siteSettings['email_kontak'] : '#') }}" class="hover:text-white transition">Kontak</a>
            </div>

            {{-- Right: Social icons --}}
            <div class="flex items-center space-x-3">
                <a href="{{ ($siteSettings['link_youtube'] ?? '') ?: '#' }}" aria-label="YouTube" class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-800 hover:bg-blue-700 transition">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
                <a href="{{ ($siteSettings['link_instagram'] ?? '') ?: '#' }}" aria-label="Instagram" class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-800 hover:bg-blue-700 transition">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="{{ ! empty($siteSettings['email_kontak']) ? 'mailto:'.$siteSettings['email_kontak'] : '#' }}" aria-label="Email" class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-800 hover:bg-blue-700 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                </a>
            </div>
        </div>
    </div>
</footer>
