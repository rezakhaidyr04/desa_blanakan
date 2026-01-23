@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-slate-50 to-teal-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-teal-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
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

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Card KTP -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">
            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884.25 1.764.6 2"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-4">Pembuatan e-KTP</h3>
            <ul class="space-y-3 text-slate-600 mb-8">
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-teal-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Fotokopi Kartu Keluarga (KK)</span>
                </li>
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-teal-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Surat Pengantar RT/RW</span>
                </li>
                 <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-teal-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Berusia 17 tahun ke atas</span>
                </li>
            </ul>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('layanan.ajukan', 'ektp') }}" class="py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold text-center rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all text-sm">Ajukan</a>
                <a href="{{ route('prosedur-ektp') }}" class="py-3 bg-slate-50 text-teal-600 font-semibold text-center rounded-xl hover:bg-teal-50 transition-colors text-sm">Prosedur</a>
            </div>
        </div>

        <!-- Card KK -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-4">Kartu Keluarga (KK)</h3>
            <ul class="space-y-3 text-slate-600 mb-8">
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Surat Pengantar RT/RW</span>
                </li>
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>KK Lama (jika pembaruan)</span>
                </li>
                 <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Buku Nikah / Akta Cerai</span>
                </li>
            </ul>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('layanan.ajukan', 'kk') }}" class="py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold text-center rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all text-sm">Ajukan</a>
                <a href="{{ route('prosedur-kk') }}" class="py-3 bg-slate-50 text-blue-600 font-semibold text-center rounded-xl hover:bg-blue-50 transition-colors text-sm">Prosedur</a>
            </div>
        </div>

        <!-- Card Akta -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">
            <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center text-pink-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-4">Akta Kelahiran</h3>
            <ul class="space-y-3 text-slate-600 mb-8">
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-pink-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Surat Keterangan Lahir (Bidan/RS)</span>
                </li>
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-pink-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Fotokopi KK & KTP Orang Tua</span>
                </li>
                 <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-pink-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Buku Nikah Orang Tua</span>
                </li>
            </ul>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('layanan.ajukan', 'akta') }}" class="py-3 bg-gradient-to-r from-pink-600 to-pink-500 text-white font-semibold text-center rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all text-sm">Ajukan</a>
                <a href="{{ route('prosedur-akta') }}" class="py-3 bg-slate-50 text-pink-600 font-semibold text-center rounded-xl hover:bg-pink-50 transition-colors text-sm">Prosedur</a>
            </div>
        </div>
        
         <!-- Card SKCK -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-8">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-4">Pengantar SKCK</h3>
            <ul class="space-y-3 text-slate-600 mb-8">
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Surat Pengantar RT/RW</span>
                </li>
                <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Fotokopi KTP & KK</span>
                </li>
                 <li class="flex items-start gap-2 text-sm">
                    <svg class="w-5 h-5 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Pas Foto 4x6 Background Merah</span>
                </li>
            </ul>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('layanan.ajukan', 'skck') }}" class="py-3 bg-gradient-to-r from-purple-600 to-purple-500 text-white font-semibold text-center rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all text-sm">Ajukan</a>
                <a href="{{ route('prosedur-skck') }}" class="py-3 bg-slate-50 text-purple-600 font-semibold text-center rounded-xl hover:bg-purple-50 transition-colors text-sm">Prosedur</a>
            </div>
        </div>

    </div>
    
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
