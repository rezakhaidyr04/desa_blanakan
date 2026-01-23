@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-slate-50 to-teal-50 py-16 md:py-24">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4 text-center">Status Pengajuan Layanan</h1>
        <p class="text-slate-600 text-center">Ditemukan {{ $requests->count() }} pengajuan</p>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if($requests->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-12 text-center">
        <svg class="w-20 h-20 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-slate-900 mb-2">Tidak Ada Pengajuan</h3>
        <p class="text-slate-600 mb-6">NIK yang Anda masukkan tidak memiliki pengajuan layanan aktif.</p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('layanan.track') }}" class="px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition-colors">
                Cek Lagi
            </a>
            <a href="{{ route('layanan') }}" class="px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                Ajukan Layanan
            </a>
        </div>
    </div>
    @else
    <div class="space-y-6">
        @foreach($requests as $request)
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg transition-shadow">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                    <div>
                        <h3 class="text-xl font-bold text-slate-900 mb-1">{{ $request->service_type_name }}</h3>
                        <p class="text-sm text-slate-500">Diajukan pada {{ $request->created_at->format('d M Y, H:i') }} WIB</p>
                    </div>
                    <div class="mt-3 md:mt-0">
                        {!! $request->status_badge !!}
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4 border-t border-slate-100">
                    <div>
                        <p class="text-sm font-semibold text-slate-700 mb-1">Nama Pemohon</p>
                        <p class="text-slate-900">{{ $request->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-700 mb-1">No. Telepon</p>
                        <p class="text-slate-900">{{ $request->phone }}</p>
                    </div>
                    @if($request->email)
                    <div>
                        <p class="text-sm font-semibold text-slate-700 mb-1">Email</p>
                        <p class="text-slate-900">{{ $request->email }}</p>
                    </div>
                    @endif
                    @if($request->purpose)
                    <div>
                        <p class="text-sm font-semibold text-slate-700 mb-1">Keperluan</p>
                        <p class="text-slate-900">{{ ucwords(str_replace('_', ' ', $request->purpose)) }}</p>
                    </div>
                    @endif
                </div>

                @if($request->status === 'processing')
                <div class="mt-4 p-4 bg-blue-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-blue-900 mb-1">Sedang Diproses</p>
                            <p class="text-sm text-blue-800">Pengajuan Anda sedang dalam proses. Kami akan menghubungi Anda segera.</p>
                        </div>
                    </div>
                </div>
                @elseif($request->status === 'completed')
                <div class="mt-4 p-4 bg-green-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-green-900 mb-1">Selesai</p>
                            <p class="text-sm text-green-800">Pengajuan Anda telah selesai diproses. {{ $request->processed_at ? 'Selesai pada ' . $request->processed_at->format('d M Y') : '' }}</p>
                            @if($request->admin_notes)
                            <p class="text-sm text-green-800 mt-2"><strong>Catatan:</strong> {{ $request->admin_notes }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @elseif($request->status === 'rejected')
                <div class="mt-4 p-4 bg-red-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-red-900 mb-1">Ditolak</p>
                            <p class="text-sm text-red-800">Maaf, pengajuan Anda tidak dapat diproses.</p>
                            @if($request->admin_notes)
                            <p class="text-sm text-red-800 mt-2"><strong>Alasan:</strong> {{ $request->admin_notes }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="mt-4 p-4 bg-yellow-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-yellow-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-yellow-900 mb-1">Menunggu Verifikasi</p>
                            <p class="text-sm text-yellow-800">Pengajuan Anda telah diterima dan menunggu verifikasi dari petugas.</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($request->documents && count($request->documents) > 0)
                <div class="mt-4 pt-4 border-t border-slate-100">
                    <p class="text-sm font-semibold text-slate-700 mb-2">Dokumen Terlampir ({{ count($request->documents) }} file)</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($request->documents as $doc)
                        <span class="inline-flex items-center px-3 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg">
                            <svg class="w-4 h-4 mr-1.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            {{ $doc['name'] ?? 'Dokumen' }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('layanan.track') }}" class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Cek Pengajuan Lain
        </a>
    </div>
    @endif
</div>
@endsection
