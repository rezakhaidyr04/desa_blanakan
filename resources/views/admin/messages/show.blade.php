@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Daftar Pesan
    </a>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-slate-200 rounded-full flex items-center justify-center">
                        <span class="text-slate-600 font-semibold text-xl">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg text-slate-800">{{ $message->name }}</h3>
                        <p class="text-slate-500">{{ $message->email }}</p>
                        @if($message->phone)
                            <p class="text-slate-500">{{ $message->phone }}</p>
                        @endif
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-500">{{ $message->created_at->format('d M Y H:i') }}</p>
                    @if($message->status == 'replied')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mt-1">Dibalas</span>
                    @elseif($message->status == 'read')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mt-1">Dibaca</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">Baru</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <h4 class="font-semibold text-slate-800 mb-2">{{ $message->subject }}</h4>
            <div class="prose prose-slate max-w-none">
                {!! nl2br(e($message->message)) !!}
            </div>
        </div>

        <!-- Reply Section -->
        @if($message->status == 'replied')
            <div class="p-6 bg-green-50 border-t border-green-200">
                <div class="flex items-center gap-2 mb-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                    <span class="font-medium text-green-800">Balasan Anda</span>
                    <span class="text-sm text-green-600">({{ $message->replied_at->format('d M Y H:i') }})</span>
                </div>
                <div class="text-green-800">
                    {!! nl2br(e($message->reply)) !!}
                </div>
            </div>
        @else
            <div class="p-6 bg-slate-50 border-t border-slate-200">
                <h4 class="font-medium text-slate-800 mb-4">Balas Pesan</h4>
                <form action="{{ route('admin.messages.reply', $message) }}" method="POST">
                    @csrf
                    <textarea name="reply" rows="4" required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 mb-4"
                        placeholder="Tulis balasan Anda...">{{ old('reply') }}</textarea>
                    @error('reply')
                        <p class="text-sm text-red-600 mb-4">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
                        Kirim Balasan
                    </button>
                </form>
            </div>
        @endif

        <!-- Actions -->
        <div class="p-6 border-t border-slate-200 flex justify-between">
            <a href="mailto:{{ $message->email }}" class="inline-flex items-center gap-2 text-teal-600 hover:text-teal-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Email Langsung
            </a>
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 text-red-600 hover:text-red-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
