@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-slate-900 to-teal-900 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">Prosedur Lengkap Layanan Administrasi</h1>
        <p class="text-xl text-slate-300 max-w-3xl mx-auto">Panduan lengkap persyaratan dan prosedur pengurusan dokumen administrasi kependudukan di Kantor Desa Blanakan</p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Card e-KTP -->
        <a href="{{ route('prosedur-ektp') }}" class="group">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 h-full">
                <div class="bg-gradient-to-br from-teal-50 to-teal-100 p-8 border-b border-teal-200">
                    <div class="w-16 h-16 bg-teal-200 rounded-xl flex items-center justify-center text-teal-600 mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884.25 1.764.6 2"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Pembuatan e-KTP</h3>
                </div>
                <div class="p-8">
                    <p class="text-slate-600 mb-6">Panduan lengkap prosedur pembuatan Kartu Tanda Penduduk elektronik dengan persyaratan yang jelas dan langkah-langkah detail.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-teal-600">✓</span>
                            <span>7-14 hari kerja</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-teal-600">✓</span>
                            <span>Usia minimal 17 tahun</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-teal-600">✓</span>
                            <span>Gratis (layanan publik)</span>
                        </div>
                    </div>
                    <div class="inline-flex items-center text-teal-600 font-semibold group-hover:translate-x-1 transition-transform">
                        Lihat Prosedur Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card Kartu Keluarga -->
        <a href="{{ route('prosedur-kk') }}" class="group">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 h-full">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 border-b border-blue-200">
                    <div class="w-16 h-16 bg-blue-200 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Kartu Keluarga (KK)</h3>
                </div>
                <div class="p-8">
                    <p class="text-slate-600 mb-6">Panduan lengkap untuk pembuatan KK baru dan pembaruan KK dengan penjelasan jenis layanan dan prosedur yang terperinci.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-blue-600">✓</span>
                            <span>5-7 hari kerja (baru)</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-blue-600">✓</span>
                            <span>2 jenis layanan</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-blue-600">✓</span>
                            <span>Gratis (layanan publik)</span>
                        </div>
                    </div>
                    <div class="inline-flex items-center text-blue-600 font-semibold group-hover:translate-x-1 transition-transform">
                        Lihat Prosedur Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card Akta Kelahiran -->
        <a href="{{ route('prosedur-akta') }}" class="group">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 h-full">
                <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-8 border-b border-pink-200">
                    <div class="w-16 h-16 bg-pink-200 rounded-xl flex items-center justify-center text-pink-600 mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Akta Kelahiran</h3>
                </div>
                <div class="p-8">
                    <p class="text-slate-600 mb-6">Panduan lengkap pembuatan akta kelahiran dengan penjelasan urgensi, prosedur awal, dan prosedur terlambat jika diperlukan.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-pink-600">✓</span>
                            <span>Batas 30 hari setelah lahir</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-pink-600">✓</span>
                            <span>3-5 hari kerja proses</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-pink-600">✓</span>
                            <span>Gratis (layanan publik)</span>
                        </div>
                    </div>
                    <div class="inline-flex items-center text-pink-600 font-semibold group-hover:translate-x-1 transition-transform">
                        Lihat Prosedur Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </a>

        <!-- Card SKCK -->
        <a href="{{ route('prosedur-skck') }}" class="group">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 h-full">
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 border-b border-purple-200">
                    <div class="w-16 h-16 bg-purple-200 rounded-xl flex items-center justify-center text-purple-600 mb-4 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Pengantar SKCK</h3>
                </div>
                <div class="p-8">
                    <p class="text-slate-600 mb-6">Panduan lengkap permohonan surat pengantar SKCK di kantor desa dengan penjelasan lanjutan ke Kepolisian Resor.</p>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-purple-600">✓</span>
                            <span>1-3 hari (desa)</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-purple-600">✓</span>
                            <span>5-7 hari (Polres)</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-700">
                            <span class="text-purple-600">✓</span>
                            <span>Berlaku 6 bulan</span>
                        </div>
                    </div>
                    <div class="inline-flex items-center text-purple-600 font-semibold group-hover:translate-x-1 transition-transform">
                        Lihat Prosedur Lengkap <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Additional Info Section -->
    <div class="mt-20 bg-gradient-to-br from-slate-50 to-teal-50 rounded-3xl p-8 md:p-12">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">Informasi Tambahan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-600 mb-2">08:00-16:00</div>
                    <p class="text-slate-700 font-semibold">Jam Layanan</p>
                    <p class="text-slate-600 text-sm mt-1">Senin-Jumat</p>
                </div>
                <div class="text-center border-l border-r border-slate-200">
                    <div class="text-4xl font-bold text-teal-600 mb-2">Gratis</div>
                    <p class="text-slate-700 font-semibold">Biaya Layanan</p>
                    <p class="text-slate-600 text-sm mt-1">Pelayanan publik desa</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-teal-600 mb-2">(0260) 425-1234</div>
                    <p class="text-slate-700 font-semibold">Hubungi Kami</p>
                    <p class="text-slate-600 text-sm mt-1">Kantor Desa Blanakan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-teal-600 to-teal-800 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ada Pertanyaan?</h2>
        <p class="text-teal-100 max-w-2xl mx-auto mb-8">Hubungi kantor desa kami untuk informasi lebih lanjut atau bantuan dalam proses pengurusan dokumen administrasi Anda.</p>
        <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-white text-teal-600 rounded-full font-bold transition-all shadow-lg hover:shadow-xl hover-lift">
            Hubungi Kantor Desa
        </a>
    </div>
</div>
@endsection
