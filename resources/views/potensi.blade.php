@extends('layouts.app')

@section('content')
<div class="bg-teal-900 py-16 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
             <path d="M0 100 Q 50 50 100 100" stroke="white" stroke-width="2" fill="none" />
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-teal-200 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-teal-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-white md:ml-2">Potensi</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-6">Potensi Desa</h1>
        <p class="text-xl text-teal-100 max-w-3xl mx-auto leading-relaxed">
            Menjelajahi kekayaan alam dan ekonomi unggulan yang menjadi nadi kehidupan Desa Blanakan.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <!-- Potensi 1: Wisata Alam -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row h-auto md:h-80 transition-transform hover:-translate-y-1 duration-300">
            <div class="md:w-1/2 bg-slate-200 relative">
                <!-- Image Placeholder -->
                <div class="absolute inset-0 flex items-center justify-center bg-teal-800 text-teal-200">
                    <span class="font-bold text-lg">Penangkaran Buaya</span>
                </div>
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="px-3 py-1 bg-teal-100 text-teal-700 rounded-full text-xs font-bold uppercase tracking-wide">Pariwisata</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Penangkaran Buaya Blanakan</h3>
                <p class="text-slate-600 mb-6 line-clamp-3">
                    Objek wisata unggulan yang dikelola oleh Perhutani. Menawarkan edukasi dan pengalaman unik melihat habitat buaya muara di ekosistem mangrove yang asri.
                </p>
                <a href="#" class="text-teal-600 font-semibold hover:text-teal-800 flex items-center">
                    Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- Potensi 2: Perikanan -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row h-auto md:h-80 transition-transform hover:-translate-y-1 duration-300">
            <div class="md:w-1/2 bg-slate-200 relative">
                 <div class="absolute inset-0 flex items-center justify-center bg-blue-800 text-blue-200">
                    <span class="font-bold text-lg">TPI Blanakan</span>
                </div>
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold uppercase tracking-wide">Ekonomi</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Tempat Pelelangan Ikan</h3>
                <p class="text-slate-600 mb-6 line-clamp-3">
                    Pusat aktivitas ekonomi nelayan. Menyediakan hasil laut segar berkualitas dan menjadi penggerak utama roda perekonomian masyarakat pesisir Blanakan.
                </p>
                <a href="#" class="text-blue-600 font-semibold hover:text-blue-800 flex items-center">
                    Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- Potensi 3: Pertanian -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row h-auto md:h-80 transition-transform hover:-translate-y-1 duration-300">
            <div class="md:w-1/2 bg-slate-200 relative">
                 <div class="absolute inset-0 flex items-center justify-center bg-green-800 text-green-200">
                    <span class="font-bold text-lg">Lahan Pertanian</span>
                </div>
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-wide">Agrikultur</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Pertanian & Tambak</h3>
                <p class="text-slate-600 mb-6 line-clamp-3">
                    Hamparan sawah dan tambak ikan bandeng/udang yang luas, menopang ketahanan pangan desa dan memasok kebutuhan pasar regional.
                </p>
                <a href="#" class="text-green-600 font-semibold hover:text-green-800 flex items-center">
                    Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- Potensi 4: Kuliner -->
         <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row h-auto md:h-80 transition-transform hover:-translate-y-1 duration-300">
            <div class="md:w-1/2 bg-slate-200 relative">
                 <div class="absolute inset-0 flex items-center justify-center bg-orange-800 text-orange-200">
                    <span class="font-bold text-lg">Kuliner Khas</span>
                </div>
            </div>
            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-bold uppercase tracking-wide">UMKM</span>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Olahan Hasil Laut</h3>
                <p class="text-slate-600 mb-6 line-clamp-3">
                    Berbagai produk olahan ikan asin, kerupuk, dan terasi khas Blanakan yang diproduksi oleh industri rumah tangga lokal dengan cita rasa otentik.
                </p>
                <a href="#" class="text-orange-600 font-semibold hover:text-orange-800 flex items-center">
                    Selengkapnya <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
