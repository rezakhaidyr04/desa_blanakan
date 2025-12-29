@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-pink-600 to-pink-800 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-pink-100 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-pink-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('layanan') }}" class="inline-flex items-center text-sm font-medium text-pink-100 hover:text-white">
                        Layanan
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-pink-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li>
                    <span class="text-sm font-medium text-white">Akta Kelahiran</span>
                </li>
            </ol>
        </nav>
        
        <div class="flex items-start gap-8">
            <div class="flex-1">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Akta Kelahiran</h1>
                <p class="text-xl text-pink-50">Panduan lengkap persyaratan dan prosedur pembuatan Akta Kelahiran untuk anak Anda</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Informasi Penting -->
            <div class="bg-pink-50 border border-pink-200 rounded-2xl p-6 mb-12">
                <h2 class="text-lg font-bold text-pink-900 mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path></svg>
                    Informasi Penting
                </h2>
                <p class="text-pink-900 text-sm">Akta Kelahiran adalah dokumen resmi yang membuktikan identitas dan status kewarganegaraan anak. Segera buat akta kelahiran dalam waktu <strong>30 hari sejak kelahiran</strong> untuk menghindari proses pendaftaran terlambat.</p>
            </div>

            <!-- Persyaratan -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center text-pink-600 font-bold">1</span>
                    Persyaratan Akta Kelahiran
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Keterangan Lahir dari Bidan/Rumah Sakit</h3>
                                <p class="text-slate-600">Dokumen resmi dari petugas kesehatan (bidan atau rumah sakit) yang menyatakan kelahiran anak.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi KTP Kedua Orang Tua</h3>
                                <p class="text-slate-600">Fotokopi KTP dari ayah dan ibu anak yang mendapat legalisir.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi Kartu Keluarga (KK)</h3>
                                <p class="text-slate-600">Fotokopi Kartu Keluarga dari orang tua anak.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Buku Nikah Orang Tua</h3>
                                <p class="text-slate-600">Fotokopi Buku Nikah dari orang tua anak yang sah secara hukum.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pengantar RT/RW</h3>
                                <p class="text-slate-600">Surat pengantar dari RT/RW setempat yang menerangkan identitas orang tua.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0 text-pink-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi Akte Cerai (Jika Diperlukan)</h3>
                                <p class="text-slate-600">Jika orang tua dalam status cerai, lampirkan fotokopi akte perceraian.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur Awal (0-30 Hari) -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">Prosedur Awal (0-30 Hari Setelah Kelahiran)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">1</div>
                            <div><h3 class="font-bold text-slate-900">Persiapan Dokumen</h3><p class="text-slate-600 text-sm mt-1">Siapkan semua dokumen persyaratan dalam 30 hari setelah kelahiran</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">2</div>
                            <div><h3 class="font-bold text-slate-900">Datang ke Kantor Desa</h3><p class="text-slate-600 text-sm mt-1">Kunjungi dengan dokumen lengkap (Senin-Jumat 08:00-16:00 WIB)</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">3</div>
                            <div><h3 class="font-bold text-slate-900">Serah Dokumen</h3><p class="text-slate-600 text-sm mt-1">Serahkan ke petugas loket untuk verifikasi kelengkapan</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">4</div>
                            <div><h3 class="font-bold text-slate-900">Pengisian Formulir</h3><p class="text-slate-600 text-sm mt-1">Isi formulir permohonan dengan data lengkap dan akurat</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">5</div>
                            <div><h3 class="font-bold text-slate-900">Pengajuan ke Dukcapil</h3><p class="text-slate-600 text-sm mt-1">Dokumen dikirim ke Dukcapil (proses 3-5 hari kerja)</p></div>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">✓</div>
                            <div><h3 class="font-bold text-slate-900">Pengambilan Akta</h3><p class="text-slate-600 text-sm mt-1">Ambil Akta Kelahiran asli dari Kantor Desa</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur Terlambat (>30 Hari) -->
            <div class="mb-12 bg-orange-50 border border-orange-200 rounded-2xl p-6">
                <h2 class="text-2xl font-bold text-orange-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Prosedur Pendaftaran Terlambat (>30 Hari)
                </h2>
                <div class="space-y-4 text-orange-900">
                    <p>Jika pendaftaran dilakukan lebih dari 30 hari setelah kelahiran, prosesnya menjadi berbeda dan membutuhkan dokumen tambahan:</p>
                    
                    <div class="bg-white rounded-lg p-4 space-y-3">
                        <div class="flex gap-3">
                            <span class="font-bold text-lg">1.</span>
                            <div>
                                <p class="font-semibold">Perlu Pernyataan Tertulis Notaris</p>
                                <p class="text-sm text-slate-700">Orang tua harus membuat pernyataan tertulis yang diketahui Notaris tentang identitas anak.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-4 space-y-3">
                        <div class="flex gap-3">
                            <span class="font-bold text-lg">2.</span>
                            <div>
                                <p class="font-semibold">Proses Pengadilan (Jika Diperlukan)</p>
                                <p class="text-sm text-slate-700">Untuk kasus tertentu, mungkin memerlukan keputusan pengadilan sebelum akta dapat diterbitkan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg p-4 space-y-3">
                        <div class="flex gap-3">
                            <span class="font-bold text-lg">3.</span>
                            <div>
                                <p class="font-semibold">Waktu Proses Lebih Lama</p>
                                <p class="text-sm text-slate-700">Waktu proses akan lebih lama, bisa mencapai 2-3 bulan tergantung kompleksitas kasus.</p>
                            </div>
                        </div>
                    </div>

                    <p class="text-sm mt-4 font-semibold">Sebaiknya hubungi Kantor Desa Blanakan untuk konsultasi lebih lanjut jika pendaftaran terlambat.</p>
                </div>
            </div>

            <!-- Catatan Penting -->
            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-lg">
                <h3 class="text-lg font-bold text-red-900 mb-4">Catatan Penting</h3>
                <ul class="space-y-3 text-sm text-slate-700">
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span><strong>Prioritas:</strong> Daftarkan kelahiran anak dalam 30 hari setelah lahir untuk menghindari prosedur yang lebih rumit</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Semua dokumen harus asli atau fotokopi yang sudah dilegalisir</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Biaya pembuatan akta kelahiran sudah termasuk dalam layanan publik desa (gratis)</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Setiap anak berhak memiliki akta kelahiran sebagai dokumen resmi identitas diri</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Untuk permasalahan khusus, hubungi Kantor Desa atau Dukcapil setempat</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Timeline</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Batas Pendaftaran</span>
                            <span class="font-bold text-pink-600">30 Hari</span>
                        </div>
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Proses Normal</span>
                            <span class="font-bold text-pink-600">3-5 Hari</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-slate-600">Biaya</span>
                            <span class="font-bold text-pink-600">Gratis</span>
                        </div>
                    </div>
                </div>

                <div class="bg-pink-50 rounded-2xl border border-pink-200 p-6">
                    <h3 class="text-lg font-bold text-pink-900 mb-4">Hubungi Kami</h3>
                    <p class="text-sm text-pink-900 mb-4">Untuk informasi lebih lanjut atau konsultasi:</p>
                    <div class="space-y-3 text-sm text-pink-900">
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
                        <a href="{{ route('prosedur-ektp') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-pink-600 transition-colors font-medium text-sm">
                            → e-KTP
                        </a>
                        <a href="{{ route('prosedur-kk') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-pink-600 transition-colors font-medium text-sm">
                            → Kartu Keluarga
                        </a>
                        <a href="{{ route('prosedur-skck') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-pink-600 transition-colors font-medium text-sm">
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
        <h2 class="text-3xl font-bold text-white mb-4">Segera Daftarkan Kelahiran Anak!</h2>
        <p class="text-slate-300 max-w-2xl mx-auto mb-8">Jangan lewatkan batas 30 hari setelah kelahiran untuk pendaftaran yang mudah dan cepat.</p>
        <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-full font-bold transition-all shadow-lg hover-lift">
            Hubungi Kantor Desa
        </a>
    </div>
</div>
@endsection
