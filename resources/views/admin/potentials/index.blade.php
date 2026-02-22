@extends('admin.layouts.app')

@section('title', 'Potensi Desa')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-slate-600">Kelola potensi dan keunggulan desa</p>
    <a href="{{ route('admin.potentials.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-4 py-2 rounded-lg flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Potensi
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Gambar</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Nama</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Kategori</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($potentials as $potential)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4">
                        @if($potential->image)
                            <img src="{{ asset('storage/' . $potential->image) }}" alt="{{ $potential->title }}" class="w-20 h-14 object-cover rounded-lg">
                        @else
                            <div class="w-20 h-14 bg-slate-200 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <h4 class="font-medium text-slate-800">{{ $potential->title }}</h4>
                        <p class="text-sm text-slate-500 truncate max-w-xs">{{ $potential->description }}</p>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ ucfirst($potential->category) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($potential->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.potentials.edit', $potential) }}" class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.potentials.destroy', $potential) }}" method="POST" onsubmit="return confirm('Hapus potensi ini?')">
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
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                        <p>Belum ada data potensi desa.</p>
                        <a href="{{ route('admin.potentials.create') }}" class="text-teal-600 hover:underline">Tambah potensi pertama</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($potentials->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $potentials->links() }}
        </div>
    @endif
</div>
@endsection
