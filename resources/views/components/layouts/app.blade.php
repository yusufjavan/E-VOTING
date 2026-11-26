<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' — ' . config('app.name') : config('app.name', 'CSSMoRA E-Voting Portal') }}</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background-slate text-slate-900 antialiased font-sans flex flex-col">
    <x-navbar />
    <div class="flex-1">
        {{ $slot }}
    </div>
    <x-footer />
</body>
</html>
