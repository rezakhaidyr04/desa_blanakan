@extends('admin.layouts.app')

@section('title', 'Pengajuan Layanan')

@section('content')
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
    <div>
        <p class="text-slate-600">Daftar pengajuan layanan online dari warga</p>
    </div>

    <form method="GET" action="{{ route('admin.service-requests.index') }}" class="flex flex-col sm:flex-row gap-2">
        <select name="service_type" class="px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700">
            <option value="">Semua Layanan</option>
            @foreach($serviceTypes as $key => $label)
                <option value="{{ $key }}" {{ request('service_type') === $key ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama / NIK / WA" class="px-4 py-2 rounded-lg border border-slate-300 bg-white text-slate-700 w-full sm:w-64" />
        <button class="px-4 py-2 rounded-lg bg-teal-600 hover:bg-teal-700 text-white font-medium">Cari</button>
    </form>
</div>

<div class="flex flex-wrap gap-2 mb-6">
    <a href="{{ route('admin.service-requests.index') }}" class="px-4 py-2 rounded-lg {{ !request('status') ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
        Semua ({{ $counts['all'] }})
    </a>
    <a href="{{ route('admin.service-requests.index', array_filter(['status' => 'pending', 'service_type' => request('service_type'), 'q' => request('q')])) }}" class="px-4 py-2 rounded-lg {{ request('status') === 'pending' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
        Menunggu ({{ $counts['pending'] }})
    </a>
    <a href="{{ route('admin.service-requests.index', array_filter(['status' => 'processing', 'service_type' => request('service_type'), 'q' => request('q')])) }}" class="px-4 py-2 rounded-lg {{ request('status') === 'processing' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
        Diproses ({{ $counts['processing'] }})
    </a>
    <a href="{{ route('admin.service-requests.index', array_filter(['status' => 'completed', 'service_type' => request('service_type'), 'q' => request('q')])) }}" class="px-4 py-2 rounded-lg {{ request('status') === 'completed' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
        Selesai ({{ $counts['completed'] }})
    </a>
    <a href="{{ route('admin.service-requests.index', array_filter(['status' => 'rejected', 'service_type' => request('service_type'), 'q' => request('q')])) }}" class="px-4 py-2 rounded-lg {{ request('status') === 'rejected' ? 'bg-teal-600 text-white' : 'bg-slate-200 text-slate-700' }}">
        Ditolak ({{ $counts['rejected'] }})
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Layanan</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Pemohon</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Kontak</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($requests as $item)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 text-slate-600 text-sm">
                        <div class="font-medium text-slate-800">{{ $item->created_at->format('d M Y') }}</div>
                        <div class="text-xs text-slate-500">{{ $item->created_at->format('H:i') }} WIB</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-slate-800">{{ $item->service_type_name }}</div>
                        @if($item->purpose)
                            <div class="text-xs text-slate-500">Keperluan: {{ ucwords(str_replace('_', ' ', $item->purpose)) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-slate-800">{{ $item->name }}</div>
                        <div class="text-xs text-slate-500">NIK: {{ $item->nik }}</div>
                    </td>
                    <td class="px-6 py-4 text-slate-600 text-sm">
                        <div>{{ $item->phone }}</div>
                        @if($item->email)
                            <div class="text-xs text-slate-500">{{ $item->email }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($item->status === 'pending')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Menunggu</span>
                        @elseif($item->status === 'processing')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Diproses</span>
                        @elseif($item->status === 'completed')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Selesai</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.service-requests.show', $item) }}" class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">Belum ada pengajuan layanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($requests->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $requests->links() }}
        </div>
    @endif
</div>
@endsection
