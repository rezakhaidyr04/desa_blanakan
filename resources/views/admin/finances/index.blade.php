@extends('admin.layouts.app')

@section('title', 'Keuangan Desa')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <p class="text-slate-600">APBDes — Anggaran Pendapatan & Belanja Desa</p>
    </div>
    <div class="flex items-center gap-3">
        {{-- Year filter --}}
        <form method="GET" class="flex items-center gap-2">
            <select name="year" onchange="this.form.submit()"
                class="border border-slate-200 rounded-lg px-3 py-2 text-sm text-slate-700 focus:ring-teal-500 focus:border-teal-500">
                @foreach($years as $y)
                    <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                @endforeach
            </select>
        </form>
        <a href="{{ route('admin.finances.create') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-4 py-2 rounded-lg flex items-center gap-2 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah
        </a>
    </div>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">{{ session('success') }}</div>
@endif

@php
    $typeLabel = ['pendapatan' => 'Pendapatan', 'belanja' => 'Belanja', 'pembiayaan' => 'Pembiayaan'];
    $typeColor = ['pendapatan' => 'green', 'belanja' => 'red', 'pembiayaan' => 'blue'];
    $grouped = $finances->groupBy('type');
@endphp

@foreach(['pendapatan', 'belanja', 'pembiayaan'] as $type)
    @if($grouped->has($type))
        @php
            $items = $grouped[$type];
            $totalBudget = $items->sum('budget');
            $totalReal   = $items->sum('realization');
            $color = $typeColor[$type];
        @endphp
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-{{ $color }}-50">
                <div class="flex items-center gap-3">
                    <span class="text-{{ $color }}-700 font-bold text-base">{{ $typeLabel[$type] }}</span>
                    <span class="text-xs bg-{{ $color }}-100 text-{{ $color }}-700 px-2 py-0.5 rounded-full">{{ $items->count() }} item</span>
                </div>
                <div class="text-right text-sm">
                    <div class="text-slate-500">Anggaran: <span class="font-semibold text-slate-800">Rp {{ number_format($totalBudget, 0, ',', '.') }}</span></div>
                    @if($totalReal)<div class="text-slate-500">Realisasi: <span class="font-semibold text-{{ $color }}-700">Rp {{ number_format($totalReal, 0, ',', '.') }}</span></div>@endif
                </div>
            </div>
            <table class="w-full">
                <thead class="bg-slate-50 text-xs text-slate-500 uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left">Kategori / Item</th>
                        <th class="px-6 py-3 text-right">Anggaran</th>
                        <th class="px-6 py-3 text-right">Realisasi</th>
                        <th class="px-6 py-3 text-center">%</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($items as $finance)
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-3">
                                <div class="text-xs text-slate-400 mb-0.5">{{ $finance->category }}</div>
                                <div class="font-medium text-slate-800 text-sm">{{ $finance->item }}</div>
                            </td>
                            <td class="px-6 py-3 text-right text-sm text-slate-700">Rp {{ number_format($finance->budget, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-right text-sm text-slate-700">
                                {{ $finance->realization ? 'Rp ' . number_format($finance->realization, 0, ',', '.') : '-' }}
                            </td>
                            <td class="px-6 py-3 text-center">
                                @if($finance->realization)
                                    <span class="text-xs font-semibold {{ $finance->realization_percent >= 90 ? 'text-green-600' : ($finance->realization_percent >= 60 ? 'text-yellow-600' : 'text-red-500') }}">
                                        {{ $finance->realization_percent }}%
                                    </span>
                                @else
                                    <span class="text-xs text-slate-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center">
                                @if($finance->is_active)
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-green-100 text-green-700">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-slate-100 text-slate-500">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.finances.edit', $finance) }}" class="p-1.5 text-teal-600 hover:bg-teal-50 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.finances.destroy', $finance) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endforeach

@if($finances->isEmpty())
    <div class="bg-white rounded-xl p-12 text-center text-slate-400">
        Belum ada data keuangan untuk tahun {{ $year }}.
        <a href="{{ route('admin.finances.create') }}" class="block mt-3 text-teal-600 hover:underline text-sm">+ Tambah data</a>
    </div>
@endif

{{ $finances->appends(['year' => $year])->links() }}
@endsection
