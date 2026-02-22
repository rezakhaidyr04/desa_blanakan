<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Musyawarah Desa 2025',
                'category' => 'kegiatan',
                'description' => 'Musyawarah Desa Blanakan membahas Rencana Kerja Pemerintah Desa tahun 2025.',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Gotong Royong Bersih Pantai',
                'category' => 'kegiatan',
                'description' => 'Kegiatan gotong royong kebersihan pantai yang melibatkan seluruh warga Desa Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Panen Raya Tambak Udang',
                'category' => 'kegiatan',
                'description' => 'Panen raya udang vaname di tambak-tambak milik warga Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1498654200943-1088dd4438ae?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Festival Nelayan Blanakan',
                'category' => 'kegiatan',
                'description' => 'Festival tahunan nelayan Blanakan yang diisi dengan syukuran melaut dan berbagai pertunjukan seni budaya.',
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Pos Yandu Aktif di Dusun',
                'category' => 'umum',
                'description' => 'Kegiatan Pos Pelayanan Terpadu (Posyandu) untuk balita dan ibu hamil di Desa Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Pembangunan Jalan Desa',
                'category' => 'pembangunan',
                'description' => 'Proses pembangunan dan perbaikan jalan desa menggunakan dana desa tahun 2025.',
                'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Pelatihan Pengolahan Ikan',
                'category' => 'kegiatan',
                'description' => 'Pelatihan pengolahan ikan menjadi produk bernilai tambah tinggi untuk ibu-ibu PKK Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Wisata Penangkaran Buaya',
                'category' => 'wisata',
                'description' => 'Kunjungan wisatawan ke penangkaran buaya yang menjadi ikon wisata Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=800&q=80',
                'is_active' => true,
            ],
            [
                'title' => 'Penanaman Mangrove',
                'category' => 'pembangunan',
                'description' => 'Program penanaman bibit mangrove bersama warga untuk menjaga ekosistem pesisir.',
                'image' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=800&q=80',
                'is_active' => true,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(['title' => $gallery['title']], $gallery);
        }
    }
}
