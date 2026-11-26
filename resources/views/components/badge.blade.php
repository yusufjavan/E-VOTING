@props([
    'variant' => 'neutral',
])

@php
    $variants = [
        'success' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
        'warning' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'danger' => 'bg-rose-50 text-rose-700 ring-rose-600/20',
        'info' => 'bg-sky-50 text-sky-700 ring-sky-600/20',
        'neutral' => 'bg-slate-100 text-slate-700 ring-slate-500/20',
    ];
    $classes = 'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ring-1 ring-inset ' . ($variants[$variant] ?? $variants['neutral']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
