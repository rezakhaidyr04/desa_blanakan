@extends('layouts.app')

@section('content')
<div class="bg-slate-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-teal-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Galeri</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Galeri Kegiatan</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Dokumentasi visual kegiatan pemerintahan, pembangunan, dan aktivitas sosial masyarakat Desa Blanakan.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- Category Filter --}}
    @if(request('category'))
        <div class="flex items-center gap-3 mb-8">
            <span class="text-slate-500 text-sm">Filter:</span>
            <span class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-sm font-semibold">
                {{ $categories[request('category')] ?? request('category') }}
            </span>
            <a href="{{ route('galeri') }}" class="text-sm text-slate-400 hover:text-teal-600 underline">Hapus filter</a>
        </div>
    @endif

    {{-- Category Pills --}}
    <div class="flex flex-wrap gap-2 mb-10">
        <a href="{{ route('galeri') }}"
           class="px-4 py-2 rounded-full text-sm font-semibold transition-all {{ !request('category') ? 'bg-teal-600 text-white shadow' : 'bg-white border border-slate-200 text-slate-600 hover:border-teal-400 hover:text-teal-600' }}">
            Semua
        </a>
        @foreach($categories as $key => $label)
        <a href="{{ route('galeri', ['category' => $key]) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold transition-all {{ request('category') == $key ? 'bg-teal-600 text-white shadow' : 'bg-white border border-slate-200 text-slate-600 hover:border-teal-400 hover:text-teal-600' }}">
            {{ $label }}
        </a>
        @endforeach
    </div>

    @if($galleries->isEmpty())
        <div class="text-center py-24 text-slate-400">
            <svg class="w-16 h-16 mx-auto mb-4 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p class="text-lg font-medium">Belum ada foto di kategori ini.</p>
        </div>
    @else
    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($galleries as $item)
        @php
            $imgUrl = \Illuminate\Support\Str::startsWith($item->image, 'http')
                ? $item->image
                : asset('storage/' . $item->image);
            $categoryLabel = $categories[$item->category] ?? ucfirst($item->category);
        @endphp
        <div class="group relative aspect-square rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition-all duration-300">
            <div class="absolute inset-0 bg-slate-200">
                <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                     style="background-image: url('{{ $imgUrl }}');"></div>
            </div>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-teal-400 text-sm font-semibold mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                    {{ $categoryLabel }}
                </span>
                <h3 class="text-white text-lg font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100 line-clamp-2">
                    {{ $item->title }}
                </h3>
                @if($item->description)
                <p class="text-white/70 text-sm mt-1 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-150 line-clamp-2">
                    {{ $item->description }}
                </p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if($galleries->hasPages())
    <div class="mt-12">
        {{ $galleries->appends(request()->query())->links() }}
    </div>
    @endif
    @endif
</div>
@endsection

