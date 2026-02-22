@extends('layouts.app')

@section('content')
<div class="bg-slate-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-teal-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
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
    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @for ($i = 1; $i <= 6; $i++)
        <div class="group relative aspect-square rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-xl transition-all duration-300">
            <!-- Placeholder Image -->
            <div class="absolute inset-0 bg-slate-200">
                <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110" style="background-image: url('https://placehold.co/600x600/cbd5e1/64748b?text=Foto+Kegiatan+{{ $i }}');"></div>
            </div>
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-teal-400 text-sm font-semibold mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Kategori Kegiatan</span>
                <h3 class="text-white text-xl font-bold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">Judul Dokumentasi Kegiatan {{ $i }}</h3>
            </div>
        </div>
        @endfor
    </div>
    
    <!-- Load More -->
    <div class="mt-12 text-center">
        <button class="px-8 py-3 bg-white border border-slate-300 text-slate-600 font-semibold rounded-xl hover:bg-slate-50 hover:border-slate-400 transition-all">
            Muat Lebih Banyak
        </button>
    </div>
</div>
@endsection
