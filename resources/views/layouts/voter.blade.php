@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <main class="bg-background-slate min-h-screen p-6">
        {{ $slot ?? '' }}
    </main>
    @include('components.footer')
@endsection