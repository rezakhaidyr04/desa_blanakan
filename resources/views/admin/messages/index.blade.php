@extends('admin.layouts.app')

@section('title', 'Pesan Masuk')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-slate-600">Pesan dari pengunjung website</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 rounded-lg {{ !request('status') ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
            Semua
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'unread']) }}" class="px-4 py-2 rounded-lg {{ request('status') == 'unread' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
            Belum Dibaca ({{ $unreadCount }})
        </a>
        <a href="{{ route('admin.messages.index', ['status' => 'replied']) }}" class="px-4 py-2 rounded-lg {{ request('status') == 'replied' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
            Dibalas
        </a>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    @if($messages->count() > 0)
        <div class="divide-y divide-slate-200">
            @foreach($messages as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="block p-6 hover:bg-slate-50 transition-colors">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-slate-200 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-slate-600 font-semibold text-lg">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-1">
                                <h4 class="font-semibold text-slate-800 {{ $message->status == 'unread' ? '' : 'font-normal' }}">{{ $message->name }}</h4>
                                @if($message->status == 'unread')
                                    <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                @elseif($message->status == 'replied')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Dibalas</span>
                                @endif
                                <span class="text-sm text-slate-500">{{ $message->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="font-medium text-slate-700 {{ $message->status == 'unread' ? '' : 'font-normal' }}">{{ $message->subject }}</p>
                            <p class="text-sm text-slate-500 truncate">{{ $message->message }}</p>
                            <p class="text-xs text-slate-400 mt-1">{{ $message->email }}</p>
                        </div>
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $messages->links() }}
        </div>
    @else
        <div class="p-12 text-center">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <p class="text-slate-500">Belum ada pesan masuk</p>
        </div>
    @endif
</div>
@endsection
