@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-blue-600 to-blue-800 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-blue-100 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('layanan') }}" class="inline-flex items-center text-sm font-medium text-blue-100 hover:text-white">
                        Layanan
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-blue-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li>
                    <span class="text-sm font-medium text-white">Kartu Keluarga (KK)</span>
                </li>
            </ol>
        </nav>
        
        <div class="flex items-start gap-8">
            <div class="flex-1">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Kartu Keluarga (KK)</h1>
                <p class="text-xl text-blue-50">Panduan lengkap persyaratan dan prosedur pembuatan atau pembaruan Kartu Keluarga</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Jenis Layanan KK -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8">Jenis Layanan Kartu Keluarga</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 border border-blue-200 hover-lift">
                        <h3 class="font-bold text-slate-900 text-lg mb-3">KK Baru</h3>
                        <p class="text-slate-700 text-sm mb-4">Untuk keluarga baru yang belum memiliki Kartu Keluarga</p>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>Keluarga yang baru pindah</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>Keluarga baru hasil pernikahan</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>KK hilang atau rusak</li>
                        </ul>
                    </div>

                    <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 border border-amber-200 hover-lift">
                        <h3 class="font-bold text-slate-900 text-lg mb-3">KK Pembaruan</h3>
                        <p class="text-slate-700 text-sm mb-4">Untuk perubahan data pada KK yang sudah ada</p>
                        <ul class="space-y-2 text-sm text-slate-700">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>Penambahan anggota keluarga</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>Pengurangan anggota keluarga</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>Perubahan data pribadi</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Persyaratan KK Baru -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 font-bold">1</span>
                    Persyaratan KK Baru
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pengantar RT/RW</h3>
                                <p class="text-slate-600">Surat pengantar dari RT/RW setempat yang menyatakan status keluarga.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Bukti Tempat Tinggal</h3>
                                <p class="text-slate-600">Dokumen yang membuktikan alamat tempat tinggal (tagihan listrik, air, atau sewa rumah).</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi KTP Kepala Keluarga</h3>
                                <p class="text-slate-600">Fotokopi KTP asli dari orang yang akan menjadi kepala keluarga.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Buku Nikah (untuk pasangan)</h3>
                                <p class="text-slate-600">Fotokopi Buku Nikah untuk pasangan suami istri, atau Surat Keterangan Cerai/Perceraian.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 text-blue-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi Akta Kelahiran Anak</h3>
                                <p class="text-slate-600">Fotokopi Akta Kelahiran untuk setiap anggota keluarga yang tercantum dalam KK.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Persyaratan KK Pembaruan -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600 font-bold">2</span>
                    Persyaratan KK Pembaruan
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0 text-amber-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">KK Lama</h3>
                                <p class="text-slate-600">Fotokopi Kartu Keluarga yang lama/asli.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0 text-amber-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pengantar RT/RW</h3>
                                <p class="text-slate-600">Surat pengantar dari RT/RW yang menerangkan perubahan data.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0 text-amber-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Dokumen Pendukung Perubahan</h3>
                                <p class="text-slate-600">Akta Kelahiran (penambahan anggota), Buku Nikah (perkawinan), Akta Cerai (perceraian), atau Surat Kematian (pengurangan anggota).</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0 text-amber-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi KTP Kepala Keluarga</h3>
                                <p class="text-slate-600">Fotokopi KTP dari kepala keluarga yang up-to-date.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8">Langkah-Langkah Prosedur</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">1</div>
                            <div><h3 class="font-bold text-slate-900">Persiapan Dokumen</h3><p class="text-slate-600 text-sm mt-1">Siapkan semua dokumen sesuai jenis layanan (KK Baru atau Pembaruan)</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">2</div>
                            <div><h3 class="font-bold text-slate-900">Datang ke Kantor Desa</h3><p class="text-slate-600 text-sm mt-1">Kunjungi dengan berkas. Jam: Senin-Jumat 08:00-16:00 WIB</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">3</div>
                            <div><h3 class="font-bold text-slate-900">Serah Terima Berkas</h3><p class="text-slate-600 text-sm mt-1">Serahkan berkas ke petugas untuk verifikasi dan pencatatan</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">4</div>
                            <div><h3 class="font-bold text-slate-900">Pengisian Formulir</h3><p class="text-slate-600 text-sm mt-1">Isi formulir dengan data lengkap dan akurat</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">5</div>
                            <div><h3 class="font-bold text-slate-900">Verifikasi Dukcapil</h3><p class="text-slate-600 text-sm mt-1">Data dikirim ke sistem untuk verifikasi</p></div>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">✓</div>
                            <div><h3 class="font-bold text-slate-900">Pengambilan KK</h3><p class="text-slate-600 text-sm mt-1">Ambil KK Anda (5-7 hari kerja)</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Catatan Penting -->
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg">
                <h3 class="text-lg font-bold text-red-900 mb-4">Catatan Penting</h3>
                <ul class="space-y-3 text-sm text-slate-700">
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Semua berkas harus asli atau fotokopi yang sudah dilegalisir</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Waktu proses KK Baru: 5-7 hari kerja, KK Pembaruan: 3-5 hari kerja</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Biaya pembuatan KK sudah termasuk dalam layanan publik desa (gratis)</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Untuk kasus khusus (kehilangan, kerusakan), hubungi desa untuk konsultasi</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Info Singkat</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Waktu Proses</span>
                            <span class="font-bold text-blue-600">5-7 Hari</span>
                        </div>
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Biaya</span>
                            <span class="font-bold text-blue-600">Gratis</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-slate-600">Jenis Layanan</span>
                            <span class="font-bold text-blue-600">2 Jenis</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 rounded-2xl border border-blue-200 p-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Hubungi Kami</h3>
                    <p class="text-sm text-blue-900 mb-4">Untuk informasi lebih lanjut:</p>
                    <div class="space-y-3 text-sm text-blue-900">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <div>
                                <p class="font-semibold">(0260) 425-1234</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Layanan Lainnya</h3>
                    <div class="space-y-2">
                        <a href="{{ route('prosedur-ektp') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-blue-600 transition-colors font-medium text-sm">
                            → e-KTP
                        </a>
                        <a href="{{ route('prosedur-akta') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-blue-600 transition-colors font-medium text-sm">
                            → Akta Kelahiran
                        </a>
                        <a href="{{ route('prosedur-skck') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-blue-600 transition-colors font-medium text-sm">
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
        <h2 class="text-3xl font-bold text-white mb-4">Butuh Kartu Keluarga Baru?</h2>
        <p class="text-slate-300 max-w-2xl mx-auto mb-8">Siapkan dokumen persyaratan dan kunjungi kantor desa untuk layanan yang cepat dan mudah.</p>
        <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-full font-bold transition-all shadow-lg hover-lift">
            Hubungi Kantor Desa
        </a>
    </div>
</div>
@endsection
