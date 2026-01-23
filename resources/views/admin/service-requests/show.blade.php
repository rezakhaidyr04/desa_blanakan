@extends('admin.layouts.app')

@section('title', 'Detail Pengajuan')

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.service-requests.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Daftar Pengajuan
    </a>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="p-6 border-b border-slate-200">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div>
                    <h3 class="font-semibold text-xl text-slate-800">{{ $serviceRequest->service_type_name }}</h3>
                    <p class="text-slate-500 text-sm">Diajukan: {{ $serviceRequest->created_at->format('d M Y H:i') }} WIB</p>
                    @if($serviceRequest->purpose)
                        <p class="text-slate-500 text-sm">Keperluan: {{ ucwords(str_replace('_', ' ', $serviceRequest->purpose)) }}</p>
                    @endif
                </div>
                <div class="text-left md:text-right">
                    @if($serviceRequest->status === 'pending')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                    @elseif($serviceRequest->status === 'processing')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Diproses</span>
                    @elseif($serviceRequest->status === 'completed')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                    @endif

                    @if($serviceRequest->processed_at)
                        <p class="text-xs text-slate-500 mt-2">Selesai: {{ $serviceRequest->processed_at->format('d M Y H:i') }} WIB</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pemohon</p>
                    <p class="font-medium text-slate-800">{{ $serviceRequest->name }}</p>
                    <p class="text-sm text-slate-600">NIK: {{ $serviceRequest->nik }}</p>
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Kontak</p>
                    <p class="text-sm text-slate-800">{{ $serviceRequest->phone }}</p>
                    @if($serviceRequest->email)
                        <p class="text-sm text-slate-800">{{ $serviceRequest->email }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Alamat</p>
                    <p class="text-sm text-slate-700">{{ $serviceRequest->address }}</p>
                </div>

                @if($serviceRequest->notes)
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Catatan Pemohon</p>
                        <p class="text-sm text-slate-700">{{ $serviceRequest->notes }}</p>
                    </div>
                @endif
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Dokumen Terlampir</p>
                    @php
                        $docs = $serviceRequest->documents ?? [];
                    @endphp

                    @if(count($docs) === 0)
                        <p class="text-sm text-slate-500">Tidak ada dokumen.</p>
                    @else
                        <div class="space-y-2">
                            @foreach($docs as $doc)
                                @php
                                    $path = $doc['path'] ?? null;
                                    $name = $doc['name'] ?? 'Dokumen';
                                @endphp
                                <div class="flex items-center justify-between gap-3 p-3 rounded-lg bg-slate-50 border border-slate-200">
                                    <div class="min-w-0">
                                        <p class="text-sm font-medium text-slate-800 truncate">{{ $name }}</p>
                                        <p class="text-xs text-slate-500 truncate">{{ $path }}</p>
                                    </div>
                                    @if($path)
                                        <a href="{{ Storage::url($path) }}" target="_blank" class="px-3 py-2 rounded-lg bg-white border border-slate-200 text-slate-700 hover:bg-slate-100 text-sm">Lihat</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="p-5 rounded-xl border border-slate-200 bg-white">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider mb-3">Ubah Status</p>
                    <form action="{{ route('admin.service-requests.update', $serviceRequest) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                            <select name="status" class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700">
                                <option value="pending" {{ $serviceRequest->status === 'pending' ? 'selected' : '' }}>Menunggu</option>
                                <option value="processing" {{ $serviceRequest->status === 'processing' ? 'selected' : '' }}>Diproses</option>
                                <option value="completed" {{ $serviceRequest->status === 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="rejected" {{ $serviceRequest->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            @error('status')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Catatan Admin (opsional)</label>
                            <textarea name="admin_notes" rows="4" class="w-full px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700" placeholder="Contoh: Silakan lengkapi fotokopi KK...">{{ old('admin_notes', $serviceRequest->admin_notes) }}</textarea>
                            @error('admin_notes')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="w-full px-4 py-3 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-medium">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
