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
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Berita</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Kabar Desa</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Berita terbaru seputar kegiatan pemerintahan, pembangunan, dan kemasyarakatan Desa Blanakan.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Featured News -->
    @if($featured)
    <div class="mb-16">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
            <div class="absolute inset-0 bg-slate-800">
                <!-- Placeholder Image -->
                <div class="w-full h-full opacity-40 bg-cover bg-center" style="background-image: url('{{ $featured->image ?? 'https://placehold.co/1200x600/1a202c/cbd5e1?text=Event+Desa' }}');"></div>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent"></div>
            
            <div class="relative z-10 p-8 md:p-16 flex flex-col justify-end h-[500px]">
                <span class="inline-block px-4 py-2 bg-teal-600 text-white text-xs font-bold uppercase tracking-wider rounded-full w-fit mb-4">{{ $featured->category }}</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight group-hover:text-teal-300 transition-colors">
                    {{ $featured->title }}
                </h2>
                <div class="flex items-center text-slate-300 text-sm mb-6 gap-4">
                    <span class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> {{ $featured->published_at->format('d M Y') }}</span>
                    <span class="flex items-center gap-2"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg> {{ $featured->author }}</span>
                </div>
                <p class="text-slate-200 text-lg line-clamp-2 max-w-4xl">
                    {{ $featured->excerpt }}
                </p>
                <a href="#" class="mt-6 text-white font-bold hover:text-teal-400 flex items-center gap-2 transition-colors">
                    Baca Selengkapnya <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($posts as $post)
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden group hover:shadow-xl transition-all duration-300">
            <div class="h-48 bg-slate-200 overflow-hidden relative">
                 <div class="absolute inset-0 bg-cover bg-center transform group-hover:scale-110 transition-transform duration-500" style="background-image: url('{{ $post->image ?? 'https://placehold.co/600x400/e2e8f0/64748b?text=News' }}');"></div>
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between mb-3 text-xs text-slate-500">
                    <span class="font-semibold text-teal-600">{{ $post->category }}</span>
                    <span>{{ $post->published_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-teal-600 transition-colors">{{ $post->title }}</h3>
                <p class="text-slate-600 text-sm line-clamp-3 mb-4">
                    {{ $post->excerpt }}
                </p>
                <a href="#" class="text-teal-600 font-semibold text-sm hover:underline">Baca Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
