<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Potential;
use Illuminate\Support\Str;

class PotentialSeeder extends Seeder
{
    public function run(): void
    {
        $potentials = [
            [
                'name' => 'Penangkaran Buaya Blanakan',
                'slug' => 'penangkaran-buaya-blanakan',
                'category' => 'wisata',
                'description' => 'Salah satu wisata unik dan langka di Jawa Barat — penangkaran buaya terbesar di kawasan pesisir utara Subang dengan ratusan ekor buaya dari berbagai jenis. Menjadi destinasi wisata edukasi yang menarik bagi pengunjung dari berbagai daerah serta berfungsi sebagai pusat konservasi dan penelitian satwa liar.',
                'image' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=800&q=80',
                'location' => 'Jl. Penangkaran No. 1, Desa Blanakan, Kec. Blanakan, Kab. Subang',
                'contact' => '(0260) 461234',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Tempat Pelelangan Ikan (TPI) Blanakan',
                'slug' => 'tempat-pelelangan-ikan-blanakan',
                'category' => 'umkm',
                'description' => 'Pusat pelelangan ikan terbesar di pantai utara Subang, jantung perekonomian nelayan Desa Blanakan. Setiap pagi ratusan nelayan berlabuh membawa hasil tangkapan segar yang langsung dilelang. Berbagai jenis ikan laut segar tersedia, mulai dari udang, cumi, kakap, kerapu, hingga bandeng.',
                'image' => 'https://images.unsplash.com/photo-1606787364406-a3cdf06c6d0c?w=800&q=80',
                'location' => 'Pelabuhan Blanakan, Desa Blanakan, Kab. Subang',
                'contact' => '(0260) 461200',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Hutan Mangrove Blanakan',
                'slug' => 'hutan-mangrove-blanakan',
                'category' => 'lainnya',
                'description' => 'Kawasan ekowisata hutan mangrove yang asri di tepi muara sungai Blanakan, surga bagi pecinta alam. Dihuni berbagai burung migran, ikan, kepiting bakau, dan satwa liar lainnya. Wisatawan dapat menikmati keindahan hutan mangrove melalui jembatan kayu atau berperahu menyusuri alur sungai.',
                'image' => 'https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?w=800&q=80',
                'location' => 'Pesisir Pantai Blanakan, Kab. Subang',
                'contact' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Tambak Udang & Ikan Bandeng',
                'slug' => 'tambak-udang-ikan-bandeng',
                'category' => 'perikanan',
                'description' => 'Sentra budidaya udang vaname dan ikan bandeng terbesar yang menjadi tulang punggung ekonomi warga Blanakan. Hasil tambak tidak hanya memenuhi kebutuhan pasar lokal tetapi juga diekspor ke berbagai daerah dan mancanegara menggunakan teknologi budidaya modern yang ramah lingkungan.',
                'image' => 'https://images.unsplash.com/photo-1498654200943-1088dd4438ae?w=800&q=80',
                'location' => 'Sepanjang wilayah Desa Blanakan',
                'contact' => null,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Kuliner Seafood Segar',
                'slug' => 'kuliner-seafood-segar',
                'category' => 'umkm',
                'description' => 'Surga kuliner seafood segar langsung dari laut — udang bakar, ikan bakar, kepiting, cumi, dan aneka hidangan laut khas Blanakan. Warung-warung makan tepi pantai menyajikan menu segar dengan harga terjangkau, menjadi daya tarik wisata kuliner yang khas.',
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800&q=80',
                'location' => 'Warung Seafood sepanjang Pantai Blanakan',
                'contact' => null,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Pertanian Padi Organik',
                'slug' => 'pertanian-padi-organik',
                'category' => 'pertanian',
                'description' => 'Program pertanian padi organik yang dikelola kelompok tani Desa Blanakan dengan metode ramah lingkungan. Hamparan sawah hijau di sisi selatan desa menghasilkan beras organik berkualitas tinggi yang mulai diminati konsumen di kota-kota besar.',
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=800&q=80',
                'location' => 'Area persawahan Desa Blanakan bagian selatan',
                'contact' => null,
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($potentials as $potential) {
            Potential::updateOrCreate(['slug' => $potential['slug']], $potential);
        }
    }
}
