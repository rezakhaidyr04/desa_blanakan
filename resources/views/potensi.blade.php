@extends('layouts.app')

@section('content')
<div class="bg-teal-900 py-16 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
             <path d="M0 100 Q 50 50 100 100" stroke="white" stroke-width="2" fill="none" />
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-teal-200 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-teal-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-white md:ml-2">Potensi</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-6">Potensi Unggulan Desa</h1>
        <p class="text-xl text-teal-100 max-w-3xl mx-auto leading-relaxed">
            Blanakan dianugerahi kekayaan alam yang luar biasa. Mari jelajahi berbagai potensi yang menjadi kebanggaan dan penopang kehidupan warga kami.
        </p>
    </div>
</div>

@php
$categoryColors = [
    'wisata'    => ['badge' => 'bg-teal-100 text-teal-700',   'link' => 'text-teal-600 hover:text-teal-800'],
    'perikanan' => ['badge' => 'bg-blue-100 text-blue-700',   'link' => 'text-blue-600 hover:text-blue-800'],
    'pertanian' => ['badge' => 'bg-green-100 text-green-700', 'link' => 'text-green-600 hover:text-green-800'],
    'umkm'      => ['badge' => 'bg-orange-100 text-orange-700','link' => 'text-orange-600 hover:text-orange-800'],
    'kerajinan' => ['badge' => 'bg-purple-100 text-purple-700','link' => 'text-purple-600 hover:text-purple-800'],
    'lainnya'   => ['badge' => 'bg-slate-100 text-slate-700', 'link' => 'text-slate-600 hover:text-slate-800'],
];
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">

    @if($potentials->isEmpty())
        <div class="text-center py-24 text-slate-400">
            <p class="text-xl">Belum ada data potensi desa.</p>
        </div>
    @else
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        @foreach($potentials as $potential)
        @php
            $imgUrl = $potential->image
                ? (\Illuminate\Support\Str::startsWith($potential->image, 'http')
                    ? $potential->image
                    : asset('storage/' . $potential->image))
                : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&q=80';
            $colors = $categoryColors[$potential->category] ?? $categoryColors['lainnya'];
            $categoryLabel = $categories[$potential->category] ?? ucfirst($potential->category);
        @endphp
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row h-auto md:h-80 transition-transform hover:-translate-y-1 duration-300">
            <div class="md:w-1/2 relative bg-slate-200 overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-110"
                     style="background-image: url('{{ $imgUrl }}');"></div>
                <div class="absolute inset-0 bg-black/20"></div>
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="px-3 py-1 {{ $colors['badge'] }} rounded-full text-xs font-bold uppercase tracking-wide">
                        {{ $categoryLabel }}
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $potential->name }}</h3>
                <p class="text-slate-600 mb-6 line-clamp-3 text-sm leading-relaxed">
                    {{ $potential->description }}
                </p>
                @if($potential->location)
                <p class="text-xs text-slate-400 mb-4 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $potential->location }}
                </p>
                @endif
                @if($potential->contact)
                <p class="text-xs text-slate-400 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    {{ $potential->contact }}
                </p>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
@endsection

