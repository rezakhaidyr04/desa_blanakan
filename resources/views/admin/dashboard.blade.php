@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-teal-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Berita</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_posts'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Galeri</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_galleries'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Perangkat Desa</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_officials'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500">Pesan</p>
                <p class="text-3xl font-bold text-slate-800">{{ $stats['total_messages'] }}</p>
                @if($stats['unread_messages'] > 0)
                    <p class="text-xs text-red-500">{{ $stats['unread_messages'] }} belum dibaca</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Posts -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-800">Berita Terbaru</h3>
            <a href="{{ route('admin.posts.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah
            </a>
        </div>
        
        <div class="divide-y divide-slate-200">
            @forelse($stats['recent_posts'] as $post)
                <div class="p-4 flex items-center gap-4 hover:bg-slate-50">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-12 h-12 object-cover rounded-lg">
                    @else
                        <div class="w-12 h-12 bg-slate-200 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h4 class="font-medium text-slate-800 truncate">{{ $post->title }}</h4>
                        <p class="text-sm text-slate-500">{{ $post->created_at->format('d M Y') }}</p>
                    </div>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-teal-600 hover:text-teal-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                </div>
            @empty
                <div class="p-6 text-center text-slate-500">
                    <p>Belum ada berita.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-slate-800">Pesan Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-teal-600 hover:text-teal-800 text-sm font-medium">
                Lihat Semua →
            </a>
        </div>
        
        <div class="divide-y divide-slate-200">
            @forelse($stats['recent_messages'] as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="p-4 flex items-start gap-4 hover:bg-slate-50 block">
                    <div class="w-10 h-10 bg-slate-200 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-slate-600 font-medium">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-slate-800 truncate">{{ $message->name }}</h4>
                            @if($message->status === 'unread')
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                            @endif
                        </div>
                        <p class="text-sm text-slate-600 truncate">{{ $message->subject }}</p>
                        <p class="text-xs text-slate-400">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            @empty
                <div class="p-6 text-center text-slate-500">
                    <p>Belum ada pesan masuk.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-6 bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-semibold text-slate-800 mb-4">Aksi Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <a href="{{ route('admin.posts.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-teal-50 hover:text-teal-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            <span class="text-sm font-medium">Tulis Berita</span>
        </a>
        <a href="{{ route('admin.galleries.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-purple-50 hover:text-purple-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span class="text-sm font-medium">Upload Foto</span>
        </a>
        <a href="{{ route('admin.officials.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-blue-50 hover:text-blue-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            <span class="text-sm font-medium">Tambah Pejabat</span>
        </a>
        <a href="{{ route('admin.sliders.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-orange-50 hover:text-orange-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
            <span class="text-sm font-medium">Tambah Slider</span>
        </a>
        <a href="{{ route('admin.services.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-green-50 hover:text-green-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            <span class="text-sm font-medium">Tambah Layanan</span>
        </a>
        <a href="{{ route('admin.potentials.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-50 hover:bg-yellow-50 hover:text-yellow-600 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            <span class="text-sm font-medium">Tambah Potensi</span>
        </a>
    </div>
</div>
@endsection
