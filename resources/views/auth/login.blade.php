<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login · {{ config('app.name', 'CSSMoRA E-Voting') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:500,600,700|figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-grid {
            background-image:
                linear-gradient(rgba(139, 185, 225, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 185, 225, .055) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        .login-panel {
            background-image:
                linear-gradient(rgba(139, 185, 225, .055) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 185, 225, .055) 1px, transparent 1px),
                linear-gradient(135deg, #0649ff 0%, #073ce2 52%, #10349f 100%);
            background-size: 32px 32px, 32px 32px, 100% 100%;
        }
        .login-dots {
            background-image: radial-gradient(rgba(164, 230, 0, .7) 1.5px, transparent 1.5px);
            background-size: 14px 14px;
        }
        .login-display {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
    </style>
</head>
<body class="min-h-screen bg-[#061a31] font-sans text-slate-900">
    <div class="login-grid fixed inset-0"></div>
    <div class="login-dots fixed right-8 top-4 h-28 w-28 opacity-60"></div>

    <main class="relative flex min-h-screen items-center justify-center px-4 py-8 sm:px-8">
        <div class="grid w-full max-w-[802px] overflow-hidden rounded-[22px] bg-white shadow-[0_24px_70px_rgba(0,0,0,.32)] md:min-h-[480px] md:grid-cols-2">
            <section class="flex flex-col px-8 py-9 sm:px-[38px] sm:py-[40px]">
                <a href="{{ route('home') }}" class="text-[11px] font-bold tracking-wide text-[#164cff]">
                    CSSMoRA / E-VOTING
                </a>

                <div class="relative top-px flex flex-1 flex-col justify-center py-8">
                    <div class="mx-auto w-full max-w-[273px]">
                        <h1 class="login-display mb-2 text-center text-[44px] font-semibold leading-none tracking-[-.045em] text-[#0b203b]">Login</h1>

                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}" class="space-y-[9px]">
                            @csrf

                            <div>
                                <label for="identifier" class="sr-only">NIA PBSB</label>
                                <input
                                    id="identifier"
                                    name="identifier"
                                    type="text"
                                    value="{{ old('identifier') }}"
                                    placeholder="NIA PBSB"
                                    autocomplete="username"
                                    required
                                    autofocus
                                    class="block h-[43px] w-full rounded-[11px] border border-[#dce5f4] bg-[#f1f5fb] px-3 text-[11px] text-slate-800 placeholder:text-[#7789a7] focus:border-blue-500 focus:ring-blue-500"
                                >
                                @error('identifier')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Password"
                                    autocomplete="current-password"
                                    required
                                    class="block h-[43px] w-full rounded-[11px] border border-[#dce5f4] bg-[#f1f5fb] px-3 text-[11px] text-slate-800 placeholder:text-[#7789a7] focus:border-blue-500 focus:ring-blue-500"
                                >
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="relative top-[7px] mt-1 h-[39px] w-full rounded-[10px] bg-[#a4e600] text-[10px] font-extrabold tracking-wide text-[#09223e] transition hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                                LOGIN
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-[9px] font-bold tracking-wide text-[#8191aa]">PRIVASI SUARA TERLINDUNGI</p>
            </section>

            <section class="login-panel relative hidden overflow-hidden px-[38px] py-[51px] text-white md:flex md:flex-col">
                <div class="login-dots absolute right-3 top-3 h-28 w-28 opacity-60"></div>
                <div class="relative inline-flex w-fit items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] text-blue-100">
                    <span class="rounded-sm bg-[#a4e600] px-1 text-[7px] font-black text-blue-800">CSSMoRA</span>
                    <span>Portal CSSMoRA PBSB</span>
                </div>

                <div class="relative my-auto">
                    <h2 class="login-display text-[50px] font-semibold leading-[1.05] tracking-[-.04em]">Halo, Teman!</h2>
                    <p class="mt-4 max-w-[270px] text-[14px] leading-[1.55] text-blue-100/75">
                        Silahkan Login dan mulai gunakan<br class="hidden xl:block"> layanan kami segera
                    </p>
                    <div class="mt-[58px] h-[3px] w-[55px] bg-[#a4e600]"></div>
                </div>

                <p class="relative text-[9px] font-bold tracking-wide text-[#b8f52b]">AMAN&nbsp; · &nbsp;RAHASIA&nbsp; · &nbsp;SATU SUARA</p>
            </section>
        </div>
    </main>
</body>
</html>
