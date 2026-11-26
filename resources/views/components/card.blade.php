@props([
    'padding' => 'p-6',
])

<div {{ $attributes->merge(['class' => "rounded-xl border border-slate-200 bg-white shadow-xs {$padding}"]) }}>
    {{ $slot }}
</div>
