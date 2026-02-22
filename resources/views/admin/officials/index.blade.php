@extends('admin.layouts.app')

@section('title', 'Perangkat Desa')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-slate-600">Kelola data perangkat/pejabat desa</p>
    <a href="{{ route('admin.officials.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-4 py-2 rounded-lg flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Pejabat
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Foto</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Nama</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Jabatan</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Kontak</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($officials as $official)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4">
                        @if($official->photo)
                            <img src="{{ asset('storage/' . $official->photo) }}" alt="{{ $official->name }}" class="w-12 h-12 object-cover rounded-full">
                        @else
                            <div class="w-12 h-12 bg-slate-200 rounded-full flex items-center justify-center">
                                <span class="text-slate-600 font-medium">{{ strtoupper(substr($official->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <h4 class="font-medium text-slate-800">{{ $official->name }}</h4>
                    </td>
                    <td class="px-6 py-4 text-slate-600">{{ $official->position }}</td>
                    <td class="px-6 py-4 text-sm text-slate-500">
                        @if($official->phone)
                            <div>{{ $official->phone }}</div>
                        @endif
                        @if($official->email)
                            <div>{{ $official->email }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($official->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.officials.edit', $official) }}" class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.officials.destroy', $official) }}" method="POST" onsubmit="return confirm('Hapus data pejabat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                        <p>Belum ada data perangkat desa.</p>
                        <a href="{{ route('admin.officials.create') }}" class="text-teal-600 hover:underline">Tambah pejabat pertama</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($officials->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $officials->links() }}
        </div>
    @endif
</div>
@endsection
