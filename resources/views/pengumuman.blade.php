@extends('layouts.app')

@section('title', 'Pengumuman Desa Blanakan')
@section('meta_description', 'Lihat pengumuman resmi dan agenda kegiatan Desa Blanakan yang terbaru dan terjadwal.')

@section('content')
<div class="bg-gradient-to-br from-slate-50 via-white to-teal-50 py-16 md:py-24 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
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
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Pengumuman</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Pengumuman & Agenda Kegiatan</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Informasi penting untuk warga, dari pengumuman desa hingga agenda kegiatan yang akan datang.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
    <section>
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-teal-50 text-teal-700 text-sm font-semibold mb-3">Pengumuman Terbaru</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Info resmi dari desa</h2>
            </div>
        </div>

        @if($announcements->isNotEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($announcements as $announcement)
                    <article class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden flex flex-col md:flex-row hover:shadow-xl transition-all duration-300">
                        <div class="md:w-56 h-56 md:h-auto bg-slate-100 flex-shrink-0">
                            <img src="{{ $announcement->display_image ?? 'https://placehold.co/600x600/e2e8f0/64748b?text=Info+Desa' }}" alt="{{ $announcement->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-center gap-2 mb-3 text-xs text-slate-500">
                                @if($announcement->is_pinned)
                                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 font-semibold">Penting</span>
                                @endif
                                <span>{{ $announcement->author ?? 'Admin Desa' }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $announcement->title }}</h3>
                            <p class="text-slate-600 leading-relaxed flex-1">{{ $announcement->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($announcement->content), 180) }}</p>
                            <div class="mt-5 text-sm text-slate-500 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ optional($announcement->created_at)->format('d M Y') }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl border border-dashed border-slate-200 p-10 text-center text-slate-500">
                Belum ada pengumuman yang dipublikasikan.
            </div>
        @endif
    </section>

    <section>
        <div class="flex items-end justify-between gap-4 mb-8">
            <div>
                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-sm font-semibold mb-3">Agenda Kegiatan</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Jadwal kegiatan yang akan datang</h2>
            </div>
        </div>

        @if($agendas->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($agendas as $agenda)
                    <article class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start justify-between gap-4 mb-6">
                            <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-700 flex flex-col items-center justify-center flex-shrink-0">
                                <span class="text-xs font-semibold uppercase">{{ optional($agenda->event_at)->format('M') ?? 'TGL' }}</span>
                                <span class="text-xl font-bold leading-none">{{ optional($agenda->event_at)->format('d') ?? '--' }}</span>
                            </div>
                            @if($agenda->is_pinned)
                                <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-semibold">Prioritas</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $agenda->title }}</h3>
                        <p class="text-slate-600 leading-relaxed mb-4">{{ $agenda->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($agenda->content), 150) }}</p>
                        <div class="space-y-2 text-sm text-slate-500">
                            @if($agenda->event_at)
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span>{{ $agenda->event_at->format('d M Y, H:i') }}</span>
                                </div>
                            @endif
                            @if($agenda->location)
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span>{{ $agenda->location }}</span>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-3xl border border-dashed border-slate-200 p-10 text-center text-slate-500">
                Belum ada agenda kegiatan yang dijadwalkan.
            </div>
        @endif
    </section>
</div>
@endsection
