@extends('admin.layouts.app')

@section('title', 'Slider/Banner')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-slate-600">Kelola slider/banner di halaman utama</p>
    <a href="{{ route('admin.sliders.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-4 py-2 rounded-lg flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Slider
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Gambar</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Judul</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Urutan</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-slate-700">Status</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-slate-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @forelse($sliders as $slider)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-32 h-20 object-cover rounded-lg">
                    </td>
                    <td class="px-6 py-4">
                        <h4 class="font-medium text-slate-800">{{ $slider->title }}</h4>
                        @if($slider->subtitle)
                            <p class="text-sm text-slate-500">{{ $slider->subtitle }}</p>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-slate-600">{{ $slider->order }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($slider->is_active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('Hapus slider ini?')">
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
                        <p>Belum ada slider.</p>
                        <a href="{{ route('admin.sliders.create') }}" class="text-teal-600 hover:underline">Tambah slider pertama</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if($sliders->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $sliders->links() }}
        </div>
    @endif
</div>
@endsection
