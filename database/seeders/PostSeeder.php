<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'title' => 'Pekan Budaya & UMKM Blanakan 2025: Pesta Rakyat untuk Kemajuan Bersama',
            'slug' => 'pekan-budaya-umkm-blanakan-2025',
            'excerpt' => 'Pemerintah Desa Blanakan menggelar pesta rakyat tahunan yang memadukan kebudayaan lokal dengan pameran produk UMKM unggulan. Acara ini menjadi ajang promosi sekaligus silaturahmi antar warga.',
            'body' => 'Pemerintah Desa Blanakan dengan bangga menggelar Pekan Budaya & UMKM Blanakan 2025, sebuah acara tahunan yang menjadi wadah bagi masyarakat untuk menampilkan kreativitas dan hasil karya terbaik mereka. Berbagai produk unggulan seperti kerupuk ikan, terasi khas Blanakan, ikan asin premium, hingga kerajinan tangan dari bahan daur ulang dipamerkan dan dijual langsung kepada pengunjung.

Acara yang berlangsung selama tiga hari ini juga dimeriahkan dengan penampilan seni tradisional, lomba kuliner, dan talkshow bersama pelaku UMKM sukses. Kepala Desa Blanakan menyampaikan harapannya agar kegiatan ini dapat terus menjadi momentum untuk mengangkat perekonomian warga dan mempererat tali persaudaraan.

"Mari kita jadikan Blanakan sebagai desa yang tidak hanya kaya akan sumber daya alam, tetapi juga kaya akan semangat gotong royong dan inovasi," ujar beliau dalam sambutannya.

Warga yang ingin berpartisipasi pada acara tahun depan dapat mendaftarkan diri melalui Kantor Desa atau menghubungi WhatsApp resmi Pemdes Blanakan.',
            'image' => 'https://placehold.co/1200x600/1a202c/cbd5e1?text=Pekan+Budaya+UMKM',
            'category' => 'Berita Utama',
            'published_at' => '2025-12-20 10:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Pembangunan Jalan Poros Menuju TPI Blanakan Telah Rampung 100%',
            'slug' => 'pembangunan-jalan-poros-tpi-rampung',
            'excerpt' => 'Proyek betonisasi jalan utama menuju Tempat Pelelangan Ikan (TPI) Blanakan resmi selesai. Akses transportasi hasil perikanan kini lebih lancar dan nyaman bagi nelayan serta pedagang.',
            'body' => 'Kabar gembira bagi seluruh warga Desa Blanakan, khususnya para nelayan dan pelaku usaha perikanan! Proyek pembangunan jalan poros menuju Tempat Pelelangan Ikan (TPI) Blanakan telah rampung 100% dan siap digunakan.

Jalan sepanjang 2,3 kilometer ini kini telah dilapisi beton berkualitas tinggi sehingga mampu menahan beban kendaraan berat pengangkut hasil laut. Pembangunan ini merupakan hasil kerja sama antara Pemerintah Desa, Dana Desa, dan partisipasi aktif masyarakat.

"Kami berharap dengan infrastruktur yang lebih baik, distribusi hasil tangkapan ikan bisa lebih cepat, harga jual lebih stabil, dan kesejahteraan nelayan meningkat," jelas Sekretaris Desa dalam peresmian proyek.

Pemerintah Desa juga mengimbau kepada seluruh pengguna jalan untuk turut menjaga kebersihan dan tidak membuang sampah sembarangan di sepanjang jalur ini.',
            'image' => 'https://placehold.co/600x400/047857/ffffff?text=Pembangunan+Jalan',
            'category' => 'Pembangunan',
            'published_at' => '2025-12-18 09:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Posyandu Ceria Blanakan: Imunisasi Lengkap untuk Generasi Sehat',
            'slug' => 'posyandu-ceria-imunisasi-lengkap',
            'excerpt' => 'Kader Posyandu Desa Blanakan gencar melaksanakan program imunisasi dasar lengkap bagi balita. Kegiatan rutin ini dilakukan di setiap dusun untuk menjangkau seluruh anak usia dini.',
            'body' => 'Kesehatan anak adalah investasi masa depan desa. Dengan semangat itulah Kader Posyandu Desa Blanakan terus bergerak aktif melaksanakan program imunisasi dasar lengkap bagi balita di setiap dusun.

Pada bulan ini, kegiatan Posyandu berhasil menjangkau lebih dari 180 balita yang mendapatkan imunisasi campak, polio, dan DPT. Selain imunisasi, para ibu juga mendapatkan edukasi tentang gizi seimbang, pentingnya ASI eksklusif, dan cara menjaga kebersihan lingkungan.

Bidan Desa menyampaikan apresiasinya kepada para kader yang tidak kenal lelah menyisir rumah-rumah warga untuk memastikan tidak ada anak yang terlewat. "Keberhasilan program ini berkat kerja sama yang solid antara Puskesmas, Kader Posyandu, dan dukungan penuh dari orang tua," ujarnya.

Jadwal Posyandu rutin dilaksanakan setiap minggu kedua setiap bulannya. Informasi lebih lanjut dapat diperoleh melalui Ketua RT/RW masing-masing atau langsung ke Balai Desa.',
            'image' => 'https://placehold.co/600x400/ec4899/ffffff?text=Posyandu+Balita',
            'category' => 'Kesehatan',
            'published_at' => '2025-12-15 08:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Penyaluran BLT Dana Desa Tahap IV Tahun 2025 Berjalan Lancar',
            'slug' => 'penyaluran-blt-dana-desa-tahap-iv',
            'excerpt' => 'Pemdes Blanakan menyalurkan Bantuan Langsung Tunai (BLT) Dana Desa tahap keempat kepada 324 Keluarga Penerima Manfaat. Pembagian dilakukan secara tertib dan transparan di Balai Desa.',
            'body' => 'Pemerintah Desa Blanakan telah menyelesaikan penyaluran Bantuan Langsung Tunai (BLT) Dana Desa Tahap IV Tahun Anggaran 2025. Sebanyak 324 Keluarga Penerima Manfaat (KPM) yang tercatat dalam Data Terpadu Kesejahteraan Sosial (DTKS) telah menerima bantuan sebesar Rp300.000 per keluarga.

Penyaluran dilakukan secara langsung di Balai Desa dengan menerapkan protokol yang tertib. Setiap KPM wajib membawa KTP dan Kartu Keluarga asli untuk verifikasi data.

Kepala Desa berpesan, "Bantuan ini diharapkan dapat meringankan beban ekonomi keluarga, terutama untuk kebutuhan pokok sehari-hari. Kami berkomitmen untuk terus mengawal program ini agar tepat sasaran dan bermanfaat."

Bagi warga yang merasa berhak namun belum terdaftar sebagai penerima, silakan melaporkan diri ke Sekretariat Desa dengan membawa dokumen pendukung untuk proses pendataan ulang.',
            'image' => 'https://placehold.co/600x400/6366f1/ffffff?text=BLT+Dana+Desa',
            'category' => 'Sosial',
            'published_at' => '2025-12-10 14:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Wisata Edukasi Penangkaran Buaya Blanakan Kembali Dibuka untuk Umum',
            'slug' => 'wisata-edukasi-penangkaran-buaya',
            'excerpt' => 'Objek wisata andalan Blanakan, Penangkaran Buaya Blanakan, kembali menerima kunjungan wisatawan setelah masa renovasi. Fasilitas baru siap menyambut pengunjung dari berbagai daerah.',
            'body' => 'Kabar baik bagi pecinta wisata alam dan edukasi! Penangkaran Buaya Blanakan yang dikelola oleh Perhutani resmi dibuka kembali untuk umum setelah menjalani renovasi fasilitas selama dua bulan terakhir.

Kawasan wisata ini menawarkan pengalaman unik melihat habitat buaya muara di tengah ekosistem mangrove yang asri. Pengunjung dapat menikmati tur edukasi tentang konservasi satwa, berfoto di spot-spot menarik, serta menyusuri jembatan kayu di atas rawa mangrove.

Beberapa fasilitas baru yang telah ditambahkan antara lain area parkir yang lebih luas, toilet bersih, warung makan dengan menu khas pesisir, serta pusat oleh-oleh hasil kerajinan warga lokal.

Harga tiket masuk sangat terjangkau: Dewasa Rp15.000 dan Anak-anak Rp10.000. Kawasan wisata buka setiap hari mulai pukul 08.00 – 17.00 WIB.

Mari dukung pariwisata lokal Blanakan! Ajak keluarga dan sahabat untuk berkunjung dan menikmati keindahan alam pesisir yang memukau.',
            'image' => 'https://placehold.co/600x400/14b8a6/ffffff?text=Penangkaran+Buaya',
            'category' => 'Pariwisata',
            'published_at' => '2025-12-05 11:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Pelatihan Digital Marketing untuk Pelaku UMKM Desa Blanakan',
            'slug' => 'pelatihan-digital-marketing-umkm',
            'excerpt' => 'Pemerintah Desa bersama Dinas Koperasi dan UMKM mengadakan pelatihan pemasaran digital bagi pelaku usaha lokal. Peserta diajarkan cara memanfaatkan media sosial dan marketplace.',
            'body' => 'Dalam upaya mendorong kemajuan ekonomi digital di tingkat desa, Pemerintah Desa Blanakan bekerja sama dengan Dinas Koperasi dan UMKM Kabupaten Subang mengadakan pelatihan Digital Marketing untuk pelaku UMKM lokal.

Pelatihan yang diikuti oleh 45 peserta ini berlangsung selama dua hari di Aula Balai Desa. Materi yang disampaikan meliputi cara membuat konten menarik di media sosial, teknik fotografi produk menggunakan smartphone, strategi pemasaran di marketplace, serta tips mengelola toko online.

Salah satu peserta, Ibu Siti penjual kerupuk ikan, mengaku sangat antusias. "Saya jadi paham bagaimana cara upload produk di Shopee dan bikin video pendek untuk TikTok. InsyaAllah setelah ini penjualan bisa naik," ujarnya semangat.

Pemerintah Desa berharap pelatihan seperti ini dapat dilaksanakan secara berkala agar UMKM Blanakan semakin kompetitif di era digital.',
            'image' => 'https://placehold.co/600x400/f59e0b/ffffff?text=Pelatihan+Digital',
            'category' => 'Pemberdayaan',
            'published_at' => '2025-12-01 09:30:00',
            'author' => 'Admin Desa',
        ]);
    }
}
