@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-slate-50 to-teal-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-teal-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Layanan</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Layanan Administrasi Desa</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Kami siap membantu Anda mengurus berbagai dokumen kependudukan. Berikut panduan lengkap persyaratan dan prosedur yang perlu Anda ketahui.
        </p>
    </div>
</div>

@php
$colorPalette = [
    ['icon_bg' => 'bg-teal-100 text-teal-600',   'btn' => 'from-teal-600 to-teal-500',   'check' => 'text-teal-500',   'link' => 'text-teal-600 hover:bg-teal-50'],
    ['icon_bg' => 'bg-blue-100 text-blue-600',   'btn' => 'from-blue-600 to-blue-500',   'check' => 'text-blue-500',   'link' => 'text-blue-600 hover:bg-blue-50'],
    ['icon_bg' => 'bg-pink-100 text-pink-600',   'btn' => 'from-pink-600 to-pink-500',   'check' => 'text-pink-500',   'link' => 'text-pink-600 hover:bg-pink-50'],
    ['icon_bg' => 'bg-purple-100 text-purple-600','btn' => 'from-purple-600 to-purple-500','check' => 'text-purple-500', 'link' => 'text-purple-600 hover:bg-purple-50'],
    ['icon_bg' => 'bg-orange-100 text-orange-600','btn' => 'from-orange-600 to-orange-500','check' => 'text-orange-500', 'link' => 'text-orange-600 hover:bg-orange-50'],
    ['icon_bg' => 'bg-green-100 text-green-600',  'btn' => 'from-green-600 to-green-500',  'check' => 'text-green-500',  'link' => 'text-green-600 hover:bg-green-50'],
];

// Prosedur route map by service slug
$prosedurRoutes = [
    'pembuatan-ektp'   => 'prosedur-ektp',
    'kartu-keluarga'   => 'prosedur-kk',
    'akta-kelahiran'   => 'prosedur-akta',
    'surat-keterangan-catatan-kepolisian' => 'prosedur-skck',
];
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @if($services->isEmpty())
        <div class="text-center py-24 text-slate-400">
            <p class="text-xl">Belum ada data layanan.</p>
        </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $idx => $service)
        @php
            $color = $colorPalette[$idx % count($colorPalette)];
            $requirements = array_filter(array_map('trim', explode("\n", $service->requirements ?? '')));
        @endphp
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8 flex flex-col">
            <div class="w-12 h-12 {{ $color['icon_bg'] }} rounded-xl flex items-center justify-center mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $service->name }}</h3>
            @if($service->duration)
                <p class="text-xs text-slate-400 mb-4 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $service->duration }}
                    @if($service->cost) · {{ $service->cost }} @endif
                </p>
            @endif
            <ul class="space-y-2 text-slate-600 mb-6 flex-1">
                @foreach(array_slice($requirements, 0, 3) as $req)
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 {{ $color['check'] }} flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ ltrim($req, '0123456789. ') }}</span>
                </li>
                @endforeach
                @if(count($requirements) > 3)
                <li class="text-xs text-slate-400 pl-7">+ {{ count($requirements) - 3 }} syarat lainnya</li>
                @endif
            </ul>
            <div class="grid grid-cols-2 gap-2 mt-auto">
                <a href="{{ route('layanan.ajukan', $service->slug) }}"
                   class="py-3 bg-gradient-to-r {{ $color['btn'] }} text-white font-semibold text-center rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all text-sm">
                    Ajukan
                </a>
                @if(isset($prosedurRoutes[$service->slug]) && \Illuminate\Support\Facades\Route::has($prosedurRoutes[$service->slug]))
                <a href="{{ route($prosedurRoutes[$service->slug]) }}"
                   class="py-3 bg-slate-50 {{ $color['link'] }} font-semibold text-center rounded-xl transition-colors text-sm">
                    Prosedur
                </a>
                @else
                <button disabled class="py-3 bg-slate-50 text-slate-400 font-semibold text-center rounded-xl text-sm cursor-default">
                    Prosedur
                </button>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- CTA Section -->
    <div class="mt-20 bg-gradient-to-br from-teal-600 to-teal-500 rounded-3xl p-8 md:p-12 text-center text-white relative overflow-hidden">
         <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white rounded-full mix-blend-soft-light filter blur-3xl opacity-20"></div>
         <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-white rounded-full mix-blend-soft-light filter blur-3xl opacity-20"></div>
         <div class="relative z-10">
            <h3 class="text-2xl md:text-3xl font-bold mb-4">Sudah Mengajukan Layanan?</h3>
            <p class="text-teal-50 max-w-2xl mx-auto mb-8">
                Lacak status pengajuan layanan Anda dengan mudah menggunakan NIK.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('layanan.track') }}" class="inline-block px-8 py-3 bg-white text-teal-600 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    Lacak Status Pengajuan
                </a>
                <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-teal-700 text-white rounded-xl font-bold transition-all hover:bg-teal-800">
                    Hubungi Kami
                </a>
            </div>
         </div>
    </div>
</div>
@endsection

