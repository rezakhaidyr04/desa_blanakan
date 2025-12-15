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
            'title' => 'Pekan Raya Blanakan: Mengangkat Potensi UMKM Lokal',
            'slug' => 'pekan-raya-blanakan',
            'excerpt' => 'Pemerintah Desa Blanakan menggelar acara tahunan untuk mempromosikan produk-produk unggulan masyarakat.',
            'body' => 'Pemerintah Desa Blanakan menggelar acara tahunan untuk mempromosikan produk-produk unggulan masyarakat, mulai dari kerajinan tangan hingga kuliner khas pesisir. Acara ini dihadiri oleh berbagai kalangan dan diharapkan dapat meningkatkan perekonomian warga lokal.',
            'image' => 'https://placehold.co/1200x600/1a202c/cbd5e1?text=Event+Desa',
            'category' => 'Berita Utama',
            'published_at' => '2024-12-15 10:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Perbaikan Jalan Poros Desa Selesai Tepat Waktu',
            'slug' => 'perbaikan-jalan-poros',
            'excerpt' => 'Proyek betonisasi jalan utama menuju TPI Blanakan telah rampung, memperlancar akses transportasi hasil perikanan.',
            'body' => 'Proyek betonisasi jalan utama menuju TPI Blanakan telah rampung, memperlancar akses transportasi hasil perikanan. Hal ini disambut gembira oleh para nelayan dan warga yang melintas setiap hari.',
            'image' => 'https://placehold.co/600x400/e2e8f0/64748b?text=Pembangunan',
            'category' => 'Pembangunan',
            'published_at' => '2024-12-12 09:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Posyandu Balita: Pentingnya Imunisasi Dasar',
            'slug' => 'posyandu-balita',
            'excerpt' => 'Kader Posyandu Desa Blanakan gencar melakukan sosialisasi dan pelaksanaan imunisasi bagi balita di setiap dusun.',
            'body' => 'Kader Posyandu Desa Blanakan gencar melakukan sosialisasi dan pelaksanaan imunisasi bagi balita di setiap dusun. Kegiatan ini rutin dilakukan demi kesehatan generasi penerus desa.',
            'image' => 'https://placehold.co/600x400/e2e8f0/64748b?text=Kesehatan',
            'category' => 'Kesehatan',
            'published_at' => '2024-12-10 08:00:00',
            'author' => 'Admin Desa',
        ]);

        \App\Models\Post::create([
            'title' => 'Penyaluran Bantuan Langsung Tunai (BLT)',
            'slug' => 'penyaluran-blt',
            'excerpt' => 'Pemdes Blanakan kembali menyalurkan BLT Dana Desa tahap akhir tahun 2024 kepada warga penerima manfaat.',
            'body' => 'Pemdes Blanakan kembali menyalurkan BLT Dana Desa tahap akhir tahun 2024 kepada warga penerima manfaat. Pembagian dilakukan di Balai Desa dengan tertib.',
            'image' => 'https://placehold.co/600x400/e2e8f0/64748b?text=Sosial',
            'category' => 'Sosial',
            'published_at' => '2024-12-08 14:00:00',
            'author' => 'Admin Desa',
        ]);
    }
}
