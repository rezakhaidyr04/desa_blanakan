@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-slate-900 border-b border-slate-700 overflow-hidden">
    <!-- Clean Background Image -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-teal-900/40 to-slate-900 z-10"></div>
        <img src="https://images.unsplash.com/photo-1544551763-77ef620b7274?auto=format&fit=crop&q=80" alt="Pantai Blanakan" class="w-full h-full object-cover opacity-30 transform scale-105 animate-pulse-slow">
    </div>
    
    <!-- Particles Canvas -->
    <canvas id="particles-canvas" class="absolute inset-0 z-0 opacity-40"></canvas>
    
    <!-- Wave Decoration (Bottom) -->
    <div class="absolute bottom-0 left-0 w-full z-10 leading-none">
        <svg class="relative block w-full h-[100px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,432.84,37.8c-274.05,4.76-42.33-53.19-432.84,37.8L0,120H1200V0C1162.84,11.36,1069.66,112.33,985.66,92.83Z" class="fill-slate-50 opacity-100"></path>
        </svg>
    </div>    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 flex flex-col md:flex-row items-center gap-12">
        <!-- Hero Text -->
        <div class="md:w-7/12 text-left z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-teal-800/50 border border-teal-700 text-teal-300 text-sm font-semibold mb-6 backdrop-blur-sm animate-fade-in-up">
                Selamat Datang di Portal Resmi
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6 leading-tight animate-fade-in-up" style="animation-delay: 0.1s">
                Desa <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-400">Blanakan</span>
                <br>Kabupaten Subang
            </h1>
            <p class="mt-4 max-w-2xl text-lg md:text-xl text-teal-100 mb-10 leading-relaxed font-light animate-fade-in-up" style="animation-delay: 0.2s">
                Pusat informasi pelayanan publik dan potensi desa. Menuju desa mandiri, inovatif, dan sejahtera berbasis maritim dan agrikultur.
            </p>
            <div class="flex gap-4 flex-col sm:flex-row animate-fade-in-up" style="animation-delay: 0.3s">
                <a href="{{ route('layanan') }}" class="px-8 py-4 bg-teal-500 hover:bg-teal-400 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-teal-500/50 text-center">
                    Layanan Publik
                </a>
                <a href="{{ route('potensi') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/20 rounded-xl font-bold backdrop-blur-md transition-all text-center">
                    Jelajahi Potensi
                </a>
            </div>
        </div>
        
        <!-- Weather Widget (New) -->
        <div class="md:w-5/12 h-64 md:h-80 w-full animate-fade-in-up" style="animation-delay: 0.4s">
            @include('components.weather-widget')
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Fitur Utama</h2>
            <div class="w-20 h-1.5 bg-teal-500 mx-auto rounded-full"></div>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Akses mudah ke berbagai informasi dan layanan desa untuk kemudahan masyarakat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div data-animate class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-teal-100 hover:shadow-2xl hover:shadow-teal-900/5 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-teal-100 rounded-full blur-2xl opacity-0 group-hover:opacity-70 transition-opacity"></div>
                <div class="w-14 h-14 bg-teal-100 rounded-2xl flex items-center justify-center text-teal-600 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Layanan Administrasi</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Pengurusan dokumen kependudukan seperti KTP, KK, dan Surat Pengantar kini lebih informatif.</p>
                <a href="{{ route('layanan') }}" class="inline-flex items-center text-teal-600 font-semibold group-hover:translate-x-1 transition-transform">
                    Lihat Prosedur <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Feature 2 -->
            <div data-animate class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-teal-100 hover:shadow-2xl hover:shadow-teal-900/5 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-orange-100 rounded-full blur-2xl opacity-0 group-hover:opacity-70 transition-opacity"></div>
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-orange-600 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Potensi Desa</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Menjelajahi keunggulan ekonomi dan wisata desa, dari penangkaran buaya hingga hasil laut.</p>
                <a href="{{ route('potensi') }}" class="inline-flex items-center text-orange-600 font-semibold group-hover:translate-x-1 transition-transform">
                    Jelajahi <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <!-- Feature 3 -->
            <div data-animate class="group p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-teal-100 hover:shadow-2xl hover:shadow-teal-900/5 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-100 rounded-full blur-2xl opacity-0 group-hover:opacity-70 transition-opacity"></div>
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Berita Terkini</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Informasi terbaru seputar kegiatan desa, pembangunan, dan pengumuman penting.</p>
                <a href="{{ route('berita') }}" class="inline-flex items-center text-blue-600 font-semibold group-hover:translate-x-1 transition-transform">
                    Baca Berita <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats / Quick Info -->
<div class="bg-slate-900 py-20 relative">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">3</div>
                <div class="text-slate-400 font-medium">Dusun</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">12k+</div>
                <div class="text-slate-400 font-medium">Penduduk</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">56</div>
                <div class="text-slate-400 font-medium">RT/RW</div>
            </div>
            <div class="p-6">
                <div class="text-4xl md:text-5xl font-bold text-teal-400 mb-2">24h</div>
                <div class="text-slate-400 font-medium">Layanan Digital</div>
            </div>
        </div>
    </div>
</div>
<!-- Map Section -->
<div class="py-20 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Peta Wilayah</h2>
            <div class="w-20 h-1.5 bg-teal-500 mx-auto rounded-full"></div>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Lokasi strategis Desa Blanakan di pesisir utara Kabupaten Subang.</p>
        </div>
        
        <div id="map" class="shadow-2xl border-4 border-white"></div>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var map = L.map('map', {
                    scrollWheelZoom: false,
                    dragging: !L.Browser.mobile, // Disable dragging on mobile for better scroll experience
                    tap: false
                }).setView([-6.2847, 107.6946], 13);
                
                // Add control to enable zoom on click/focus if needed
                map.on('click', function() {
                    // map.scrollWheelZoom.enable();
                });

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Markers
                var locations = [
                    { lat: -6.2847, lng: 107.6946, title: "Kantor Desa Blanakan", icon: '🏛️' },
                    { lat: -6.2750, lng: 107.7000, title: "TPI Blanakan", icon: '🐟' },
                    { lat: -6.2700, lng: 107.6900, title: "Penangkaran Buaya", icon: '🐊' }
                ];

                locations.forEach(function(loc) {
                     var marker = L.marker([loc.lat, loc.lng]).addTo(map);
                     marker.bindPopup(`<b>${loc.icon} ${loc.title}</b>`).openPopup();
                });
            });

            // Modern Particle System
            (function() {
                const canvas = document.getElementById('particles-canvas');
                if (!canvas) return;
                
                const ctx = canvas.getContext('2d');
                let width, height;
                let particles = [];
                
                function resize() {
                    width = canvas.width = canvas.offsetWidth;
                    height = canvas.height = canvas.offsetHeight;
                }
                
                class Particle {
                    constructor() {
                        this.reset();
                    }
                    
                    reset() {
                        this.x = Math.random() * width;
                        this.y = Math.random() * height;
                        this.vx = (Math.random() - 0.5) * 0.5;
                        this.vy = (Math.random() - 0.5) * 0.5;
                        this.radius = Math.random() * 2 + 1;
                        this.alpha = Math.random() * 0.5 + 0.1;
                        this.color = Math.random() > 0.5 ? '20, 184, 166' : '94, 234, 212'; // Teal colors
                    }
                    
                    update() {
                        this.x += this.vx;
                        this.y += this.vy;
                        
                        if (this.x < 0 || this.x > width) this.vx *= -1;
                        if (this.y < 0 || this.y > height) this.vy *= -1;
                    }
                    
                    draw() {
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(${this.color}, ${this.alpha})`;
                        ctx.fill();
                    }
                }
                
                function init() {
                    resize();
                    particles = [];
                    for (let i = 0; i < 50; i++) {
                        particles.push(new Particle());
                    }
                }
                
                function animate() {
                    ctx.clearRect(0, 0, width, height);
                    particles.forEach(p => {
                        p.update();
                        p.draw();
                    });
                    requestAnimationFrame(animate);
                }
                
                window.addEventListener('resize', init);
                init();
                animate();
            })();
        </script>
    </div>
</div>

@endsection
