<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Blanakan - Kecamatan Blanakan, Subang</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.5);
        }
        .marquee-container { overflow: hidden; white-space: nowrap; }
        .marquee-content { display: inline-block; animation: marquee 20s linear infinite; }
        @keyframes marquee { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }
        #map { height: 400px; width: 100%; border-radius: 1rem; z-index: 10; }
        
        /* Fix for Leaflet tiles breaking in Tailwind */
        .leaflet-pane img, 
        .leaflet-tile, 
        .leaflet-marker-icon, 
        .leaflet-marker-shadow {
            max-width: none !important;
            max-height: none !important;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 z-[60] bg-white flex items-center justify-center transition-opacity duration-500">
        <div class="flex flex-col items-center">
            <div class="w-12 h-12 border-4 border-teal-200 border-t-teal-600 rounded-full animate-spin mb-4"></div>
            <p class="text-teal-600 font-semibold animate-pulse">Memuat Desa Blanakan...</p>
        </div>
    </div>

    <!-- Breaking News Ticker -->
    <div class="fixed top-20 w-full z-40 bg-slate-900 text-white text-sm py-2 overflow-hidden shadow-md">
        <div class="max-w-7xl mx-auto flex items-center px-4">
            <span class="bg-red-600 px-2 py-0.5 rounded text-xs font-bold mr-3 animate-pulse">INFO TERKINI</span>
            <div class="marquee-container flex-1">
                <div class="marquee-content">
                    🌊 Waspada gelombang tinggi di perairan utara Blanakan 2-3 hari ke depan. 📢 Penyaluran BLT Dana Desa Tahap 4 akan dilaksanakan tanggal 20 Desember di Balai Desa. 🐟 Harga ikan di TPI Blanakan stabil. 🚜 Program subsidi pupuk untuk kelompok tani mulai didistribusikan.
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed w-full z-50 transition-all duration-300 glass-nav" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 bg-teal-600 rounded-lg flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-teal-600/20">
                        B
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-slate-900 tracking-tight">Desa Blanakan</h1>
                        <p class="text-xs text-teal-600 font-medium">Kabupaten Subang</p>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('home') ? 'text-teal-600' : 'text-slate-600' }}">Beranda</a>
                    <a href="{{ route('profil') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('profil') ? 'text-teal-600' : 'text-slate-600' }}">Profil</a>
                    <a href="{{ route('potensi') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('potensi') ? 'text-teal-600' : 'text-slate-600' }}">Potensi</a>
                    <a href="{{ route('layanan') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('layanan') ? 'text-teal-600' : 'text-slate-600' }}">Layanan</a>
                    <a href="{{ route('berita') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('berita') ? 'text-teal-600' : 'text-slate-600' }}">Berita</a>
                    <a href="{{ route('galeri') }}" class="text-sm font-medium transition-colors hover:text-teal-600 {{ request()->routeIs('galeri') ? 'text-teal-600' : 'text-slate-600' }}">Galeri</a>
                    <a href="{{ route('kontak') }}" class="px-5 py-2.5 bg-teal-600 text-white text-sm font-medium rounded-full hover:bg-teal-700 transition-all shadow-lg shadow-teal-600/20 hover:shadow-teal-600/30">
                        Hubungi Kami
                    </a>
                    <!-- Search Button -->
                    <button id="search-toggle" class="p-2 text-slate-500 hover:text-teal-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>

    <!-- Search Modal -->
    <div id="search-modal" class="fixed inset-0 z-[70] bg-slate-900/50 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-x-0 top-0 p-4 transform -translate-y-full transition-transform duration-300 bg-white shadow-2xl" id="search-panel">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center gap-4">
                    <div class="relative flex-1">
                        <input type="text" placeholder="Cari layanan, berita, atau informasi..." class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-xl text-lg focus:ring-2 focus:ring-teal-500 outline-none">
                        <svg class="w-6 h-6 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <button id="search-close" class="p-2 text-slate-500 hover:text-red-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-slate-600 hover:text-slate-900 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
            
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 shadow-xl">
            <div class="flex flex-col space-y-1 px-4 py-4">
                <a href="{{ route('home') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('home') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('profil') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Profil</a>
                <a href="{{ route('potensi') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('potensi') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Potensi</a>
                <a href="{{ route('layanan') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('layanan') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Layanan</a>
                <a href="{{ route('berita') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('berita') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Berita</a>
                <a href="{{ route('galeri') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('galeri') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Galeri</a>
                <a href="{{ route('kontak') }}" class="px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('kontak') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:bg-slate-50' }}">Hubungi Kami</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-teal-500 rounded flex items-center justify-center text-white font-bold text-lg">B</div>
                        <span class="text-xl font-bold text-white">Desa Blanakan</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Mewujudkan Desa Blanakan yang Maju, Sejahtera, dan Berdaya Saing melalui Pemanfaatan Potensi Lokal.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('profil') }}" class="hover:text-teal-400 transition-colors">Profil Desa</a></li>
                        <li><a href="{{ route('potensi') }}" class="hover:text-teal-400 transition-colors">Potensi Wisata</a></li>
                        <li><a href="{{ route('layanan') }}" class="hover:text-teal-400 transition-colors">Layanan Publik</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-teal-400 transition-colors">Kabar Desa</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-teal-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Raya Blanakan No. 1, Kec. Blanakan, Kab. Subang, Jawa Barat</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>admin@blanakan.desa.id</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-4">Jam Pelayanan</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex justify-between"><span>Senin - Kamis</span> <span>08:00 - 15:00</span></li>
                        <li class="flex justify-between"><span>Jumat</span> <span>08:00 - 11:00</span></li>
                        <li class="flex justify-between text-slate-500"><span>Sabtu - Minggu</span> <span>Tutup</span></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 mt-12 pt-8">
                <!-- Social Media -->
                <div class="flex justify-center gap-4 mb-6">
                    <a href="https://facebook.com/desablanakan" target="_blank" class="w-10 h-10 bg-slate-800 hover:bg-blue-600 rounded-full flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://instagram.com/desablanakan" target="_blank" class="w-10 h-10 bg-slate-800 hover:bg-pink-600 rounded-full flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://twitter.com/desablanakan" target="_blank" class="w-10 h-10 bg-slate-800 hover:bg-sky-500 rounded-full flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="https://youtube.com/@desablanakan" target="_blank" class="w-10 h-10 bg-slate-800 hover:bg-red-600 rounded-full flex items-center justify-center text-slate-400 hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
                
                <div class="text-center text-sm text-slate-500">
                    &copy; 2024 Pemerintah Desa Blanakan. All rights reserved.
                </div>

                <!-- Admin Login Link -->
                <div class="text-center mt-4">
                    <a href="/admin/login" class="inline-flex items-center gap-2 text-xs text-slate-500 hover:text-teal-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Admin Login
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 bg-teal-600 hover:bg-teal-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all opacity-0 pointer-events-none z-40 flex items-center justify-center">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</body>
</html>
