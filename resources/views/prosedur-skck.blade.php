@extends('layouts.app')

@section('content')
<!-- Header Section -->
<div class="bg-gradient-to-br from-purple-600 to-purple-800 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-purple-100 hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-purple-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('layanan') }}" class="inline-flex items-center text-sm font-medium text-purple-100 hover:text-white">
                        Layanan
                    </a>
                </li>
                <li>
                    <svg class="w-6 h-6 text-purple-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg>
                </li>
                <li>
                    <span class="text-sm font-medium text-white">Pengantar SKCK</span>
                </li>
            </ol>
        </nav>
        
        <div class="flex items-start gap-8">
            <div class="flex-1">
                <div class="inline-flex items-center gap-3 mb-4">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Surat Keterangan Catatan Kepolisian (SKCK)</h1>
                <p class="text-xl text-purple-50">Panduan lengkap meminta surat pengantar SKCK ke kantor desa</p>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Info Box -->
            <div class="bg-purple-50 border border-purple-200 rounded-2xl p-6 mb-12">
                <h2 class="text-lg font-bold text-purple-900 mb-3 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path></svg>
                    Apa itu SKCK?
                </h2>
                <p class="text-purple-900 text-sm mb-3">SKCK (Surat Keterangan Catatan Kepolisian) adalah surat yang diterbitkan oleh Kepolisian untuk membuktikan bahwa seseorang tidak memiliki catatan kriminal. Surat ini diperlukan untuk berbagai keperluan seperti lamaran kerja, sekolah, dan kebutuhan administratif lainnya.</p>
                <p class="text-purple-900 text-sm"><strong>Catatan:</strong> Surat pengantar dari desa adalah langkah pertama. Proses penerbitan SKCK sebenarnya dilakukan langsung oleh Kepolisian Resor (Polres).</p>
            </div>

            <!-- Persyaratan -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 font-bold">1</span>
                    Persyaratan Surat Pengantar SKCK
                </h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 text-purple-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi KTP Asli</h3>
                                <p class="text-slate-600">Fotokopi KTP yang masih berlaku dari pemohon.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 text-purple-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Fotokopi Kartu Keluarga (KK)</h3>
                                <p class="text-slate-600">Fotokopi Kartu Keluarga yang menunjukkan hubungan keluarga.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 text-purple-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pengantar RT/RW</h3>
                                <p class="text-slate-600">Surat pengantar dari RT/RW setempat yang menerangkan identitas dan karakter pemohon.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 text-purple-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Pas Foto Berwarna</h3>
                                <p class="text-slate-600">Pas foto berwarna ukuran 4x6 cm dengan latar belakang merah sebanyak 2-3 lembar.</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 hover:shadow-lg transition-shadow hover-lift">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0 text-purple-600 font-bold">✓</div>
                            <div>
                                <h3 class="font-bold text-slate-900 mb-2">Surat Pernyataan Umum</h3>
                                <p class="text-slate-600">Surat pernyataan dari pemohon yang menjelaskan keperluan SKCK (boleh dicapai di desa atau menggunakan template Polres).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prosedur di Desa -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">Prosedur Pengajuan di Kantor Desa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">1</div>
                            <div><h3 class="font-bold text-slate-900">Persiapan Dokumen</h3><p class="text-slate-600 text-sm mt-1">Siapkan semua dokumen persyaratan yang diperlukan</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">2</div>
                            <div><h3 class="font-bold text-slate-900">Datang ke Kantor Desa</h3><p class="text-slate-600 text-sm mt-1">Kunjungi dengan dokumen lengkap (Senin-Jumat 08:00-16:00)</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">3</div>
                            <div><h3 class="font-bold text-slate-900">Serah Dokumen</h3><p class="text-slate-600 text-sm mt-1">Serahkan ke petugas untuk verifikasi kelengkapan</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">4</div>
                            <div><h3 class="font-bold text-slate-900">Pengisian Formulir</h3><p class="text-slate-600 text-sm mt-1">Isi formulir dengan data lengkap dan akurat</p></div>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 hover:shadow-lg transition-all hover-lift">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">5</div>
                            <div><h3 class="font-bold text-slate-900">Tandatangan & Cap Desa</h3><p class="text-slate-600 text-sm mt-1">Surat ditandatangani & dicap kepala desa (1-3 hari)</p></div>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">✓</div>
                            <div><h3 class="font-bold text-slate-900">Ambil Surat Pengantar</h3><p class="text-slate-600 text-sm mt-1">Ambil surat pengantar untuk dibawa ke Polres</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Langkah Berikutnya -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">Langkah Berikutnya: Ke Kepolisian Resor (Polres)</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">1</div>
                            <div><h3 class="font-bold text-slate-900">Bawa Surat Pengantar</h3><p class="text-slate-600 text-sm mt-1">Bawa surat pengantar dari desa beserta KTP, KK, dan pas foto</p></div>
                        </div>
                    </div>
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">2</div>
                            <div><h3 class="font-bold text-slate-900">Pengajuan di Kepolisian</h3><p class="text-slate-600 text-sm mt-1">Serahkan dokumen ke bagian pelayanan Kepolisian Resor</p></div>
                        </div>
                    </div>
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0 text-sm">3</div>
                            <div><h3 class="font-bold text-slate-900">Verifikasi Data</h3><p class="text-slate-600 text-sm mt-1">Kepolisian melakukan verifikasi dan pemeriksaan riwayat kriminal</p></div>
                        </div>
                    </div>
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">✓</div>
                            <div><h3 class="font-bold text-slate-900">Pengambilan SKCK</h3><p class="text-slate-600 text-sm mt-1">Ambil SKCK asli (waktu proses 5-7 hari kerja)</p></div>
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
                        <span>Kantor Desa hanya mengeluarkan surat pengantar, SKCK asli diterbitkan oleh Kepolisian Resor</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Fotokopi dokumen harus jelas dan dapat dibaca dengan baik</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Pas foto harus berwarna dengan latar belakang merah, menghadap ke depan, dan ekspresi wajah netral</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Biaya surat pengantar dari desa gratis, biaya SKCK dari Kepolisian sesuai tarif yang berlaku</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>SKCK berlaku selama 6 bulan sejak tanggal penerbitan</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-red-500 font-bold">•</span>
                        <span>Untuk informasi lebih detail tentang Kepolisian, hubungi Polres Subang di (0260) 525-015</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="sticky top-24 space-y-6">
                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Informasi Cepat</h3>
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Waktu (Desa)</span>
                            <span class="font-bold text-purple-600">1-3 Hari</span>
                        </div>
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Waktu (Polres)</span>
                            <span class="font-bold text-purple-600">5-7 Hari</span>
                        </div>
                        <div class="flex justify-between items-start pb-4 border-b border-slate-200">
                            <span class="text-slate-600">Biaya (Desa)</span>
                            <span class="font-bold text-purple-600">Gratis</span>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-slate-600">Berlaku</span>
                            <span class="font-bold text-purple-600">6 Bulan</span>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-50 rounded-2xl border border-purple-200 p-6">
                    <h3 class="text-lg font-bold text-purple-900 mb-4">Hubungi Kami</h3>
                    <p class="text-sm text-purple-900 mb-4">Untuk informasi lebih lanjut:</p>
                    <div class="space-y-3 text-sm text-purple-900">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <div>
                                <p class="font-semibold">Desa</p>
                                <p>(0260) 425-1234</p>
                            </div>
                        </div>
                        <div class="border-t border-purple-200 pt-3 mt-3 flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <div>
                                <p class="font-semibold">Polres Subang</p>
                                <p>(0260) 525-015</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Layanan Lainnya</h3>
                    <div class="space-y-2">
                        <a href="{{ route('prosedur-ektp') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-purple-600 transition-colors font-medium text-sm">
                            → e-KTP
                        </a>
                        <a href="{{ route('prosedur-kk') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-purple-600 transition-colors font-medium text-sm">
                            → Kartu Keluarga
                        </a>
                        <a href="{{ route('prosedur-akta') }}" class="block p-3 rounded-lg hover:bg-slate-50 text-slate-700 hover:text-purple-600 transition-colors font-medium text-sm">
                            → Akta Kelahiran
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
        <h2 class="text-3xl font-bold text-white mb-4">Butuh Surat Pengantar SKCK?</h2>
        <p class="text-slate-300 max-w-2xl mx-auto mb-8">Siapkan dokumen persyaratan dan kunjungi kantor desa untuk mendapatkan surat pengantar SKCK Anda.</p>
        <a href="{{ route('kontak') }}" class="inline-block px-8 py-3 bg-purple-500 hover:bg-purple-600 text-white rounded-full font-bold transition-all shadow-lg hover-lift">
            Hubungi Kantor Desa
        </a>
    </div>
</div>
@endsection
