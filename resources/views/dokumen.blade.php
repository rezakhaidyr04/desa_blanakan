@extends('layouts.app')

@section('title', 'Dokumen Publik Desa Blanakan')
@section('meta_description', 'Unduh dokumen publik, formulir, dan arsip layanan Desa Blanakan langsung dari website resmi.')

@section('content')
<div class="bg-gradient-to-br from-slate-50 via-white to-blue-50 py-16 md:py-24 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Dokumen Publik</span>
                    </div>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Dokumen Publik</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Unduh dokumen layanan, formulir, dan arsip publik desa langsung dari halaman ini.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($documents->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($documents as $document)
                <article class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 hover:shadow-xl transition-all duration-300 flex flex-col">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center mb-5">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V7l-5-5H7a2 2 0 00-2 2v15a2 2 0 002 2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9h6m-6 4h6m-6 4h4"></path></svg>
                    </div>
                    <div class="mb-4">
                        @if($document->category)
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold mb-3">{{ $document->category }}</span>
                        @endif
                        <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $document->title }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $document->description ?? 'Dokumen publik yang dapat diunduh warga.' }}</p>
                    </div>

                    <div class="mt-auto space-y-4">
                        <div class="text-sm text-slate-500">
                            <span class="font-semibold text-slate-700">Nama file:</span>
                            {{ $document->download_label }}
                        </div>

                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <span>{{ number_format($document->download_count) }} unduhan</span>
                            <span>{{ $document->created_at?->format('d M Y') }}</span>
                        </div>

                        @if($document->file_path)
                            <a href="{{ route('dokumen.download', $document) }}" class="inline-flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Unduh Dokumen
                            </a>
                        @else
                            <button type="button" disabled class="inline-flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl bg-slate-100 text-slate-400 font-semibold cursor-not-allowed">
                                File belum tersedia
                            </button>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-3xl border border-dashed border-slate-200 p-10 text-center text-slate-500">
            Belum ada dokumen publik yang dapat diunduh.
        </div>
    @endif
</div>
@endsection
