@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

        <h2 class="text-xl font-semibold mb-4">Total Barang Berdasarkan Tipe</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @php
                $colors = [
                    'bg-red-600',
                    'bg-green-600',
                    'bg-blue-600',
                    'bg-yellow-600',
                    'bg-purple-600',
                    'bg-pink-600',
                    'bg-indigo-600',
                    'bg-teal-600',
                    'bg-orange-500',
                    'bg-amber-600',
                    'bg-lime-600',
                    'bg-emerald-600',
                    'bg-cyan-600',
                    'bg-sky-600',
                    'bg-violet-600',
                    'bg-fuchsia-600',
                    'bg-rose-600',
                ];
            @endphp
            @foreach ($assets as $asset)
                @php
                    $randomColor = $colors[array_rand($colors)];
                @endphp
                <div class="{{ $randomColor }} p-6 rounded-lg shadow-md text-white">
                    <h3 class="text-lg font-bold mb-2 capitalize">{{ $asset->type }}</h3>
                    <p>Total: {{ $asset->total }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
