@extends('layouts.app')

@section('content')

{{-- Header --}}
<div class="bg-slate-50 py-16 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1">
                <li><a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-teal-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Beranda
                </a></li>
                <li><svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li><span class="text-sm font-medium text-slate-900">Transparansi Keuangan</span></li>
            </ol>
        </nav>
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">Transparansi Keuangan Desa</h1>
                <p class="text-slate-600">APBDes — Anggaran Pendapatan & Belanja Desa Blanakan</p>
            </div>
            {{-- Year Filter --}}
            @if($availableYears->count() > 1)
            <div class="flex items-center gap-2 flex-wrap">
                @foreach($availableYears as $y)
                    <a href="{{ route('keuangan', ['year' => $y]) }}"
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition-all
                              {{ $y == $year ? 'bg-teal-600 text-white shadow' : 'bg-white text-slate-600 border border-slate-200 hover:border-teal-400 hover:text-teal-600' }}">
                        {{ $y }}
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
        @php
            $cards = [
                ['label' => 'Total Pendapatan', 'value' => $totalPendapatan, 'sub' => 'Anggaran ' . $year, 'color' => 'emerald', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Realisasi Pendapatan', 'value' => $realPendapatan, 'sub' => $totalPendapatan > 0 ? round(($realPendapatan/$totalPendapatan)*100,1).'% dari anggaran' : '-', 'color' => 'teal', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Total Belanja', 'value' => $totalBelanja, 'sub' => 'Anggaran ' . $year, 'color' => 'orange', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
                ['label' => 'Realisasi Belanja', 'value' => $realBelanja, 'sub' => $totalBelanja > 0 ? round(($realBelanja/$totalBelanja)*100,1).'% dari anggaran' : '-', 'color' => 'blue', 'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ];
        @endphp
        @foreach($cards as $card)
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-{{ $card['color'] }}-100 rounded-xl flex items-center justify-center text-{{ $card['color'] }}-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/></svg>
                </div>
            </div>
            <div class="text-xl font-bold text-slate-900 mb-0.5">
                Rp {{ number_format($card['value'], 0, ',', '.') }}
            </div>
            <div class="text-sm text-slate-500">{{ $card['label'] }}</div>
            <div class="text-xs text-{{ $card['color'] }}-600 font-medium mt-1">{{ $card['sub'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Disclaimer --}}
    <div class="flex items-start gap-3 bg-blue-50 border border-blue-100 rounded-2xl px-5 py-4 mb-10 text-sm text-blue-700">
        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>Data APBDes Tahun <strong>{{ $year }}</strong> ini dipublikasikan sebagai bentuk transparansi keuangan Pemerintah Desa Blanakan sesuai amanat UU No. 6 Tahun 2014 tentang Desa.</span>
    </div>

    @php
        $sections = [
            ['key' => 'pendapatanGrouped', 'label' => 'Pendapatan Desa', 'type' => 'pendapatan',
             'desc' => 'Seluruh penerimaan uang melalui rekening kas desa.',
             'color' => 'emerald', 'border' => 'border-emerald-500', 'bg' => 'bg-emerald-50'],
            ['key' => 'belanjaGrouped', 'label' => 'Belanja Desa', 'type' => 'belanja',
             'desc' => 'Pengeluaran dari rekening kas desa untuk membiayai program & kegiatan.',
             'color' => 'orange', 'border' => 'border-orange-500', 'bg' => 'bg-orange-50'],
            ['key' => 'pembiayaanGrouped', 'label' => 'Pembiayaan Desa', 'type' => 'pembiayaan',
             'desc' => 'Penerimaan dan pengeluaran pembiayaan untuk menutup defisit/surplus.',
             'color' => 'blue', 'border' => 'border-blue-500', 'bg' => 'bg-blue-50'],
        ];
    @endphp

    @foreach($sections as $section)
        @php $varName = $section['key']; $grouped = $$varName; $color = $section['color']; @endphp
        @if($grouped->isNotEmpty())
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-8">
            {{-- Section header --}}
            <div class="border-l-4 {{ $section['border'] }} {{ $section['bg'] }} px-6 py-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">{{ $section['label'] }}</h2>
                    <p class="text-sm text-slate-500 mt-0.5">{{ $section['desc'] }}</p>
                </div>
                <div class="text-right hidden sm:block">
                    <div class="text-sm text-slate-500">Total Anggaran</div>
                    <div class="text-base font-bold text-slate-800">
                        Rp {{ number_format($grouped->flatten()->sum('budget'), 0, ',', '.') }}
                    </div>
                </div>
            </div>

            {{-- Categories --}}
            <div class="divide-y divide-slate-100">
                @foreach($grouped as $category => $items)
                    @php
                        $catBudget = $items->sum('budget');
                        $catReal   = $items->sum('realization');
                        $catPct    = $catBudget > 0 && $catReal > 0 ? round(($catReal / $catBudget) * 100, 1) : 0;
                    @endphp
                    <div class="px-6 py-4">
                        {{-- Category label + total --}}
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-wide text-{{ $color }}-700 bg-{{ $color }}-50 px-3 py-1 rounded-full">
                                {{ $category }}
                            </span>
                            <span class="text-sm font-semibold text-slate-700">Rp {{ number_format($catBudget, 0, ',', '.') }}</span>
                        </div>

                        {{-- Items --}}
                        <div class="space-y-3">
                            @foreach($items as $item)
                                @php
                                    $pct = $item->realization_percent;
                                    $barColor = $pct >= 90 ? 'bg-emerald-500' : ($pct >= 60 ? 'bg-yellow-400' : 'bg-red-400');
                                @endphp
                                <div class="pl-3 border-l-2 border-slate-100">
                                    <div class="flex items-start justify-between gap-4 mb-1.5">
                                        <div class="text-sm text-slate-700 font-medium leading-snug">{{ $item->item }}</div>
                                        <div class="text-right flex-shrink-0">
                                            <div class="text-sm font-semibold text-slate-800">Rp {{ number_format($item->budget, 0, ',', '.') }}</div>
                                            @if($item->realization)
                                                <div class="text-xs text-slate-500">Realisasi: Rp {{ number_format($item->realization, 0, ',', '.') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($item->realization)
                                        <div class="flex items-center gap-3">
                                            <div class="flex-1 bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                                <div class="{{ $barColor }} h-1.5 rounded-full transition-all duration-500"
                                                     style="width: {{ $pct }}%"></div>
                                            </div>
                                            <span class="text-xs font-semibold {{ $pct >= 90 ? 'text-emerald-600' : ($pct >= 60 ? 'text-yellow-600' : 'text-red-500') }} w-12 text-right">{{ $pct }}%</span>
                                        </div>
                                    @else
                                        <div class="text-xs text-slate-400 italic">Realisasi belum tersedia</div>
                                    @endif
                                    @if($item->notes)
                                        <div class="text-xs text-slate-400 mt-1">📝 {{ $item->notes }}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    @endforeach

    @if($pendapatanGrouped->isEmpty() && $belanjaGrouped->isEmpty() && $pembiayaanGrouped->isEmpty())
        <div class="text-center py-24 text-slate-400">
            <svg class="w-16 h-16 mx-auto mb-4 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="font-medium">Data keuangan tahun {{ $year }} belum tersedia.</p>
        </div>
    @endif

    {{-- Footer note --}}
    <p class="text-xs text-slate-400 text-center mt-8">
        Data diperbarui secara berkala oleh Pemerintah Desa Blanakan &bull; Sumber: Sistem Keuangan Desa (Siskeudes)
    </p>
</div>
@endsection
