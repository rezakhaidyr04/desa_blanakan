<div id="weather-widget" class="bg-gradient-to-br from-blue-600 to-teal-500 rounded-3xl p-6 text-white shadow-xl relative overflow-hidden h-full">
    <!-- Background Decor -->
    <div class="absolute inset-0 opacity-20">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
             <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
        </svg>
    </div>
    
    <div class="relative z-10">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-lg flex items-center gap-2">
                <svg class="w-5 h-5 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Cuaca Maritim Blanakan
            </h3>
            <span class="text-xs bg-white/20 px-2 py-1 rounded-full animate-pulse">Live</span>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="text-center md:text-left">
                <div class="text-5xl font-bold mb-1" id="weather-temp">--°C</div>
                <div class="text-blue-100" id="weather-desc">Memuat data...</div>
            </div>
            
            <div class="flex-1 grid grid-cols-2 gap-4 text-sm w-full">
                <div class="bg-white/10 rounded-xl p-3 backdrop-blur-sm">
                    <div class="text-blue-200 text-xs mb-1">Angin</div>
                    <div class="font-bold flex items-center gap-1" id="weather-wind">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        -- km/h
                    </div>
                </div>
                <div class="bg-white/10 rounded-xl p-3 backdrop-blur-sm">
                    <div class="text-blue-200 text-xs mb-1">Kelembaban</div>
                    <div class="font-bold flex items-center gap-1" id="weather-humidity">
                         <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        --%
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4 pt-4 border-t border-white/10 text-xs text-blue-100 flex justify-between items-center">
             <span>Lokasi: Pesisir Blanakan</span>
             <span>Update: <span id="weather-time">--:--</span></span>
        </div>
    </div>
</div>

<script>
    // Simple Weather Fetcher (Open-Meteo API - Free, No Key)
    document.addEventListener('DOMContentLoaded', function() {
        const lat = -6.28; // Approx Blanakan
        const long = 107.69;
        
        fetch(`https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${long}&current=temperature_2m,relative_humidity_2m,wind_speed_10m&timezone=Asia%2FJakarta`)
            .then(response => response.json())
            .then(data => {
                const current = data.current;
                document.getElementById('weather-temp').innerText = `${Math.round(current.temperature_2m)}°C`;
                document.getElementById('weather-wind').innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> ${current.wind_speed_10m} km/j`;
                document.getElementById('weather-humidity').innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg> ${current.relative_humidity_2m}%`;
                
                // Simple condition guess
                const temp = current.temperature_2m;
                let desc = 'Cerah Berawan';
                if (temp > 32) desc = 'Panas Terik';
                if (temp < 24) desc = 'Sejuk';
                // Note: Open-Meteo 'weather_code' would be better but keeping it simple
                
                document.getElementById('weather-desc').innerText = desc;
                
                const now = new Date();
                document.getElementById('weather-time').innerText = now.toLocaleTimeString('id-ID', {hour: '2-digit', minute:'2-digit'});
            })
            .catch(err => {
                console.error('Weather fetch error:', err);
                document.getElementById('weather-desc').innerText = 'Data tidak tersedia';
            });
    });
</script>
