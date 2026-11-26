<nav class="bg-primary-dark text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            {{-- Logo --}}
            <div class="flex items-center space-x-2">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/10">
                    <svg class="h-6 w-6 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold leading-tight">CSSMoRA</p>
                    <p class="text-[10px] uppercase tracking-wider text-blue-300">E-Voting Portal</p>
                </div>
            </div>

            {{-- Navigation Links --}}
            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('home') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition
                          {{ request()->routeIs('home') ? 'bg-accent-lime text-primary-dark' : 'text-white hover:bg-white/10' }}">
                    <span class="flex items-center space-x-1">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                        <span>Beranda</span>
                    </span>
                </a>
                <a href="{{ route('daftar-kandidat') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition
                          {{ request()->routeIs('daftar-kandidat') ? 'bg-accent-lime text-primary-dark' : 'text-white hover:bg-white/10' }}">
                    <span class="flex items-center space-x-1">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
                        <span>Daftar Kandidat</span>
                    </span>
                </a>
                <a href="{{ route('pilih.index') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium transition
                          {{ request()->routeIs('pilih.*') ? 'bg-accent-lime text-primary-dark' : 'text-white hover:bg-white/10' }}">
                    <span class="flex items-center space-x-1">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Pilih Kandidat</span>
                    </span>
                </a>
            </div>

            {{-- User Menu --}}
            <div class="hidden md:flex items-center space-x-3">
                <div class="flex items-center space-x-2 rounded-full bg-white/10 px-4 py-2">
                    <svg class="h-5 w-5 text-accent-lime" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    <span class="text-sm font-medium">Halo, Ahmad Fauzi</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
                </div>
                <a href="#" class="flex items-center space-x-1 rounded-full bg-white/20 px-4 py-2 text-sm font-medium hover:bg-white/30 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>
                    <span>Logout</span>
                </a>
            </div>

            {{-- Mobile menu button --}}
            <div class="md:hidden">
                <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="text-white hover:text-accent-lime">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-white/10 px-4 pb-4 pt-2 space-y-2">
        <a href="{{ route('home') }}" class="block rounded-lg px-3 py-2 text-sm {{ request()->routeIs('home') ? 'bg-accent-lime text-primary-dark font-semibold' : 'text-white hover:bg-white/10' }}">Beranda</a>
        <a href="{{ route('daftar-kandidat') }}" class="block rounded-lg px-3 py-2 text-sm {{ request()->routeIs('daftar-kandidat') ? 'bg-accent-lime text-primary-dark font-semibold' : 'text-white hover:bg-white/10' }}">Daftar Kandidat</a>
        <a href="{{ route('pilih.index') }}" class="block rounded-lg px-3 py-2 text-sm {{ request()->routeIs('pilih.*') ? 'bg-accent-lime text-primary-dark font-semibold' : 'text-white hover:bg-white/10' }}">Pilih Kandidat</a>
    </div>
</nav>
