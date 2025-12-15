@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="bg-slate-50 py-16 md:py-24 border-b border-slate-200">
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
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Profil</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Profil Desa</h1>
        <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            Menelusuri jejak sejarah, visi, dan semangat Desa Blanakan dalam membangun masyarakat yang maju dan sejahtera.
        </p>
    </div>
</div>

<!-- Sejarah -->
<div class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-teal-600 font-semibold tracking-wide uppercase text-sm">Sejarah Kami</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2 mb-6">Asal Usul Blanakan</h2>
                <div class="prose prose-slate text-slate-600 leading-relaxed">
                    <p class="mb-4">
                        Desa Blanakan memiliki sejarah panjang sebagai salah satu pusat pesisir di Kabupaten Subang. Dengan letak geografis yang strategis di pesisir utara Jawa, Blanakan telah lama menjadi titik temu budaya maritim dan agrikultur.
                    </p>
                    <p>
                        Nama "Blanakan" sendiri dipercaya berasal dari sejarah lokal yang kaya, mencerminkan identitas masyarakat yang tangguh dan adaptif terhadap alam. Sejak berdiri, desa ini terus berkembang menjadi sentra perikanan dan pertanian yang vital bagi ekonomi daerah sekitarnya.
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-video bg-slate-200 rounded-2xl overflow-hidden shadow-2xl">
                    <!-- Placeholder for History Image -->
                    <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400">
                        <svg class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <!-- Decorative element -->
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-teal-50 rounded-full -z-10"></div>
            </div>
        </div>
    </div>
</div>

<!-- Visi Misi -->
<div class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900">Visi & Misi</h2>
            <div class="w-20 h-1.5 bg-teal-500 mx-auto rounded-full mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600 mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-6">Visi</h3>
                <p class="text-xl text-slate-600 italic font-medium leading-relaxed">
                    "Terwujudnya Desa Blanakan yang Maju, Mandiri, Sejahtera, dan Berdaya Saing melalui Optimalisasi Potensi Kelautan dan Pertanian Berbasis Kearifan Lokal."
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mb-8">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-6">Misi</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex flex-shrink-0 items-center justify-center text-sm font-bold mt-0.5">1</div>
                        <span class="text-slate-600">Meningkatkan kualitas pelayanan publik yang transparan dan akuntabel.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex flex-shrink-0 items-center justify-center text-sm font-bold mt-0.5">2</div>
                        <span class="text-slate-600">Mengembangkan potensi ekonomi lokal melalui pemberdayaan UMKM dan koperasi.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex flex-shrink-0 items-center justify-center text-sm font-bold mt-0.5">3</div>
                        <span class="text-slate-600">Mewujudkan infrastruktur desa yang memadai dan berkelanjutan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex flex-shrink-0 items-center justify-center text-sm font-bold mt-0.5">4</div>
                        <span class="text-slate-600">Melestarikan budaya dan kearifan lokal sebagai identitas desa.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Struktur Organisasi (Simple Representation) -->
<div class="py-20 bg-white border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-slate-900 mb-12">Struktur Pemerintahan</h2>
        
        <div class="flex justify-center mb-12">
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-slate-100 w-64">
                <div class="w-24 h-24 bg-slate-200 rounded-full mx-auto mb-4 overflow-hidden">
                    <svg class="w-full h-full text-slate-400" viewBox="0 0 24 24" fill="currentColor"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="font-bold text-lg text-slate-900">Nama Kades</h3>
                <p class="text-teal-600 text-sm font-medium">Kepala Desa</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
             <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-200 rounded-full mx-auto mb-4 overflow-hidden">
                     <svg class="w-full h-full text-slate-400" viewBox="0 0 24 24" fill="currentColor"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="font-bold text-slate-900">Nama Sekdes</h3>
                <p class="text-slate-500 text-sm">Sekretaris Desa</p>
            </div>
             <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-200 rounded-full mx-auto mb-4 overflow-hidden">
                     <svg class="w-full h-full text-slate-400" viewBox="0 0 24 24" fill="currentColor"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="font-bold text-slate-900">Nama Kasie</h3>
                <p class="text-slate-500 text-sm">Kasie Pemerintahan</p>
            </div>
             <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-200 rounded-full mx-auto mb-4 overflow-hidden">
                     <svg class="w-full h-full text-slate-400" viewBox="0 0 24 24" fill="currentColor"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="font-bold text-slate-900">Nama Kaur</h3>
                <p class="text-slate-500 text-sm">Kaur Keuangan</p>
            </div>
        </div>
    </div>
</div>
@endsection
