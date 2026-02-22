@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-slate-800 to-slate-900 py-12 md:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-300 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('berita') }}" class="inline-flex items-center text-sm font-medium text-slate-300 hover:text-white">
                        Berita
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li>
                    <span class="text-sm font-medium text-white">{{ Str::limit($post->title, 30) }}</span>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Article Content -->
        <div class="lg:col-span-2">
            <article class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <!-- Featured Image -->
                @if($post->image)
                    <div class="aspect-video w-full">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="aspect-video w-full bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center">
                        <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                @endif

                <div class="p-6 md:p-8">
                    <!-- Category & Date -->
                    <div class="flex items-center gap-4 mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-teal-100 text-teal-800">
                            {{ $post->category }}
                        </span>
                        <span class="text-slate-500 text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $post->created_at->format('d F Y') }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">{{ $post->title }}</h1>

                    <!-- Author -->
                    <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-200">
                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <div>
                            <p class="font-medium text-slate-900">{{ $post->author ?? 'Admin Desa' }}</p>
                            <p class="text-sm text-slate-500">Penulis</p>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div class="bg-slate-50 border-l-4 border-teal-500 p-4 rounded-r-lg mb-6">
                        <p class="text-slate-700 italic">{{ $post->excerpt }}</p>
                    </div>

                    <!-- Content -->
                    <div class="prose prose-slate max-w-none">
                        {!! nl2br(e($post->body)) !!}
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-6 border-t border-slate-200">
                        <p class="text-sm font-medium text-slate-700 mb-3">Bagikan Berita:</p>
                        <div class="flex items-center gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . request()->url()) }}" target="_blank" class="w-10 h-10 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Back Button -->
            <div class="mt-6">
                <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 text-teal-600 hover:text-teal-800 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Berita
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Related Posts -->
            @if($relatedPosts->count() > 0)
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Berita Terkait</h3>
                    <div class="space-y-4">
                        @foreach($relatedPosts as $related)
                            <a href="{{ route('berita.detail', $related->slug) }}" class="flex gap-4 group">
                                @if($related->image)
                                    <img src="{{ $related->image }}" alt="{{ $related->title }}" class="w-20 h-16 object-cover rounded-lg flex-shrink-0">
                                @else
                                    <div class="w-20 h-16 bg-slate-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div>
                                    <h4 class="font-medium text-slate-800 group-hover:text-teal-600 transition-colors line-clamp-2">{{ $related->title }}</h4>
                                    <p class="text-sm text-slate-500 mt-1">{{ $related->created_at->format('d M Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Categories -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                <h3 class="text-lg font-bold text-slate-900 mb-4">Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-teal-100 text-teal-800 rounded-full text-sm">Pengumuman</span>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Kegiatan</span>
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">Pembangunan</span>
                    <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">Sosial</span>
                    <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm">Kesehatan</span>
                    <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-sm">Pendidikan</span>
                </div>
            </div>

            <!-- Info Box -->
            <div class="bg-slate-800 rounded-2xl shadow-sm p-6">
                <h3 class="text-lg font-bold mb-3 text-white">Kontak Redaksi</h3>
                <p class="text-slate-300 text-sm mb-4">Punya informasi atau berita untuk dibagikan?</p>
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class="text-slate-200">pemdes.blanakan@subang.go.id</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span class="text-slate-200">(0260) 461234</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
