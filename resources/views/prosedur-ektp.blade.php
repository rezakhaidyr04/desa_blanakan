@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-teal-700 to-teal-900 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-teal-100 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-teal-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('layanan') }}" class="inline-flex items-center text-sm font-medium text-teal-100 hover:text-white">
                        Layanan
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-teal-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li>
                    <span class="text-sm font-medium text-white">Pembuatan e-KTP</span>
                </li>
            </ol>
        </nav>
        
        <div class="flex items-start gap-8">
            <div class="flex-1">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884.25 1.764.6 2"></path></svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Pembuatan e-KTP</h1>
                <p class="text-xl text-teal-50">Panduan lengkap persyaratan dan prosedur pembuatan Kartu Tanda Penduduk elektronik (e-KTP)</p>
            </div>
            <div class="hidden md:block text-white/20">
                <svg class="w-48 h-48" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884.25 1.764.6 2"></path></svg>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Persyaratan Section -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center text-teal-600 font-bold">1</span>
                    Persyaratan Umum
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0 text-teal-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Kartu Keluarga (KK) - Fotokopi</h3>
                                <p class="text-slate-600">Fotokopi kartu keluarga asli yang masih berlaku dari Desa setempat.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0 text-teal-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pengantar RT/RW</h3>
                                <p class="text-slate-600">Surat pengantar dari RT/RW setempat yang berisi keterangan tentang identitas pemohon.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0 text-teal-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Usia Minimal 17 Tahun</h3>
                                <p class="text-slate-600">Pemohon harus berusia 17 tahun ke atas atau sudah menikah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0 text-teal-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">KTP Lama (Jika Ada)</h3>
                                <p class="text-slate-600">Bagi yang sudah pernah memiliki KTP, silakan bawa KTP lama atau surat keterangan hilang dari polisi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Langkah-Langkah Prosedur</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">1</div>
                            <div><h3 class="font-bold text-slate-900">Datang ke Kantor Desa</h3><p class="text-slate-600 text-sm mt-1">Kunjungi dengan semua berkas. Jam: Senin-Jumat 08:00-16:00 WIB</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">2</div>
                            <div><h3 class="font-bold text-slate-900">Serahkan Berkas ke Petugas</h3><p class="text-slate-600 text-sm mt-1">Petugas melakukan verifikasi kelengkapan dokumen Anda</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">3</div>
                            <div><h3 class="font-bold text-slate-900">Pengisian Formulir</h3><p class="text-slate-600 text-sm mt-1">Isi formulir dengan data lengkap sesuai dokumen resmi</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">4</div>
                            <div><h3 class="font-bold text-slate-900">Perekaman Data & Foto</h3><p class="text-slate-600 text-sm mt-1">Data direkam dan dilakukan pengambilan foto identitas</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">5</div>
                            <div><h3 class="font-bold text-slate-900">Pengajuan ke Dukcapil</h3><p class="text-slate-600 text-sm mt-1">Dokumen dikirimkan ke Dinas Kependudukan untuk penerbitan</p></div>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">✓</div>
                            <div><h3 class="font-bold text-slate-900">Pengambilan e-KTP</h3><p class="text-slate-600 text-sm mt-1">Ambil e-KTP Anda sesuai jadwal yang ditentukan (7-14 hari kerja)</p></div>
                        </div>
                    </div>

            <!-- Catatan Penting -->
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg">
                <h3 class="text-lg font-bold text-red-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Penting untuk Diperhatikan
                </h3>
                <ul class="space-y-3 text-sm text-slate-700">
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Semua berkas harus asli atau fotokopi yang sudah dilegalisir dari pihak yang berwenang</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Data yang sudah disampaikan harus akurat dan sesuai dengan dokumen resmi</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Jika ada perubahan data, harus mengajukan perubahan data ke Dukcapil terlebih dahulu</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Biaya pembuatan e-KTP sudah termasuk dalam layanan publik desa (gratis)</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Jika perlu informasi lebih lanjut, hubungi petugas di Kantor Desa Blanakan</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Ringkasan -->
            <div class="sticky top-24 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Info Singkat</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Waktu Proses</span>
                            <span class="font-bold text-teal-600">7-14 hari</span>
                        </div>
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Biaya</span>
                            <span class="font-bold text-teal-600">Gratis</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-slate-600">Usia Minimal</span>
                            <span class="font-bold text-teal-600">17 Tahun</span>
                        </div>
                    </div>
                </div>

                <div class="bg-teal-50 rounded-2xl border border-teal-200 p-6">
                    <h3 class="text-lg font-bold text-teal-900 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        Hubungi Kami
                    </h3>
                    <p class="text-sm text-teal-900 mb-4">Untuk informasi lebih lanjut atau bantuan:</p>
                    <div class="space-y-3 text-sm text-teal-900">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <div>
                                <p class="font-semibold">Telepon</p>
                                <p>(0260) 425-1234</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div>
                                <p class="font-semibold">Lokasi</p>
                                <p>Jl. Raya Blanakan No. 1</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div>
                                <p class="font-semibold">Jam Layanan</p>
                                <p>Senin-Jumat 08:00-16:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Layanan Lainnya -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Layanan Lainnya</h3>
                    <div class="space-y-2">
                        <a href="{{ route('prosedur-kk') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-teal-600 transition-colors font-medium text-sm hover-text-teal">
                            → Kartu Keluarga
                        </a>
                        <a href="{{ route('prosedur-akta') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-teal-600 transition-colors font-medium text-sm hover-text-teal">
                            → Akta Kelahiran
                        </a>
                        <a href="{{ route('prosedur-skck') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-teal-600 transition-colors font-medium text-sm hover-text-teal">
                            → Pengantar SKCK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Membuat e-KTP?</h2>
        <p class="text-slate-300 max-w-2xl mx-auto mb-8">Siapkan dokumen persyaratan Anda dan kunjungi kantor desa untuk proses pendaftaran yang mudah dan cepat.</p>
        <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-teal-500 hover:bg-teal-600 text-white rounded-full font-bold transition-all shadow-lg hover:shadow-teal-500/50 hover-lift">
            Hubungi Kantor Desa
        </a>
    </div>
</div>
@endsection
