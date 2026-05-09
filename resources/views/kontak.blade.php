@extends('layouts.app')

@section('title', 'Kontak Desa Blanakan')
@section('meta_description', 'Hubungi Pemerintah Desa Blanakan untuk pertanyaan, saran, aspirasi, dan layanan publik.')

@section('content')
<div class="min-h-screen bg-slate-50 py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
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
                            <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Hubungi Kami</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Hubungi Kami</h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Kami selalu terbuka untuk mendengar suara Anda. Sampaikan pertanyaan, saran, atau aspirasi Anda — kami siap membantu dengan sepenuh hati.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div class="space-y-8">
                <!-- Map Container -->
                <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 h-[400px]">
                    <div id="contact-map" class="w-full h-full rounded-2xl z-10"></div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var map = L.map('contact-map', {
                            scrollWheelZoom: false,
                            dragging: !L.Browser.mobile,
                            tap: false
                        }).setView([-6.2847, 107.6946], 14);

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        L.marker([-6.2847, 107.6946]).addTo(map)
                            .bindPopup('<b>Kantor Desa Blanakan</b><br>Jl. Raya Blanakan No. 1').openPopup();
                    });
                </script>
                <!-- Info Card -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Informasi Kontak</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Alamat Kantor</h4>
                                <p class="text-slate-600 leading-relaxed">
                                    Jl. Raya Blanakan No. 1<br>
                                    Kecamatan Blanakan, Kabupaten Subang<br>
                                    Jawa Barat, 41259
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Email Resmi</h4>
                                <p class="text-slate-600">admin@blanakan.desa.id</p>
                                <p class="text-slate-600">layanan@blanakan.desa.id</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600 flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">Telepon / WhatsApp</h4>
                                <p class="text-slate-600">0260-1234567 (Telepon)</p>
                                <p class="text-slate-600">0812-3456-7890 (WhatsApp)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-slate-200 rounded-3xl h-64 md:h-80 overflow-hidden shadow-sm relative group">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15873.308726526132!2d107.6366113!3d-6.2872221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697a7e8e8e8e8f%3A0x123456789abcdef!2sBlanakan%2C%20Subang%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1634567890123!5m2!1sen!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                    <!-- Overlay prevents interaction until hover/click if desired, but iframe handles it usually. Added subtle shadow inset. -->
                    <div class="pointer-events-none absolute inset-0 shadow-inner rounded-3xl border border-black/10"></div>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-slate-100">
                <h3 class="text-2xl font-bold text-slate-900 mb-2">Kirim Pesan</h3>
                <p class="text-slate-500 mb-8">Ada pertanyaan atau masukan? Isi formulir di bawah ini dan tim kami akan segera merespons pesan Anda.</p>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-teal-50 border border-teal-200 text-teal-800 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                
                <form action="{{ route('kontak.submit') }}" method="POST" class="space-y-6" data-loading-form>
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition-all outline-none @error('name') border-red-500 @enderror" placeholder="Masukkan nama Anda">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition-all outline-none @error('email') border-red-500 @enderror" placeholder="contoh@email.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subjek</label>
                        <select id="subject" name="subject" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition-all outline-none bg-white @error('subject') border-red-500 @enderror">
                            <option value="Layanan Publik" {{ old('subject') == 'Layanan Publik' ? 'selected' : '' }}>Layanan Publik</option>
                            <option value="Aspirasi / Saran" {{ old('subject') == 'Aspirasi / Saran' ? 'selected' : '' }}>Aspirasi / Saran</option>
                            <option value="Pengaduan" {{ old('subject') == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                            <option value="Lainnya" {{ old('subject') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-teal-500 focus:ring focus:ring-teal-200 transition-all outline-none resize-none @error('message') border-red-500 @enderror" placeholder="Tuliskan pesan Anda di sini...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" data-loading-submit class="w-full py-4 bg-teal-600 text-white font-bold rounded-xl shadow-lg shadow-teal-600/20 hover:bg-teal-700 hover:shadow-teal-600/40 transition-all transform hover:-translate-y-1 inline-flex items-center justify-center gap-2">
                        <svg data-loading-spinner class="hidden h-5 w-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
                        <span>Kirim Pesan</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-20 bg-white rounded-3xl border border-slate-100 shadow-sm p-8 md:p-10" x-data="{ open: 0 }">
        <div class="text-center mb-10">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-100 text-slate-700 text-sm font-semibold mb-3">FAQ</span>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-3">Pertanyaan yang sering ditanyakan</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Beberapa jawaban singkat untuk membantu warga menemukan informasi lebih cepat tanpa harus menunggu balasan.</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-4">
            <template x-for="(item, index) in [
                { q: 'Bagaimana cara mengajukan layanan online?', a: 'Masuk ke menu Layanan, pilih jenis layanan, lalu isi formulir pengajuan sesuai data KTP.' },
                { q: 'Berapa lama proses pengajuan surat?', a: 'Waktu proses bergantung pada jenis layanan dan kelengkapan berkas. Informasi estimasi ada di halaman layanan.' },
                { q: 'Bagaimana cara melacak status pengajuan?', a: 'Gunakan menu Lacak Status pada halaman Layanan dan masukkan NIK pemohon.' },
                { q: 'Apakah dokumen publik bisa diunduh?', a: 'Bisa. Buka menu Dokumen untuk melihat daftar arsip dan formulir yang tersedia.' },
                { q: 'Apakah ada kontak WhatsApp resmi?', a: 'Ada. Gunakan tombol WhatsApp hijau yang melayang di kanan bawah halaman.' }
            ]" :key="index">
                <div class="border border-slate-200 rounded-2xl overflow-hidden">
                    <button type="button" class="w-full flex items-center justify-between gap-4 px-5 py-4 text-left bg-slate-50 hover:bg-slate-100 transition-colors" @click="open = open === index ? null : index">
                        <span class="font-semibold text-slate-900" x-text="item.q"></span>
                        <svg class="w-5 h-5 text-slate-500 transition-transform" :class="open === index ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open === index" x-transition class="px-5 py-4 text-slate-600 bg-white">
                        <span x-text="item.a"></span>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection
