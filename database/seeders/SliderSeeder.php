<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Selamat Datang di Desa Blanakan',
                'subtitle' => 'Desa maritim yang asri di pesisir utara Kabupaten Subang — tempat di mana laut dan sawah menyatu dalam harmoni.',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1400&q=80',
                'button_text' => 'Jelajahi Desa',
                'button_link' => '/profil',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Layanan Publik Online',
                'subtitle' => 'Ajukan permohonan dokumen kependudukan Anda secara online. Cepat, mudah, dan transparan.',
                'image' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?w=1400&q=80',
                'button_text' => 'Ajukan Sekarang',
                'button_link' => '/layanan',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Wisata Penangkaran Buaya',
                'subtitle' => 'Kunjungi salah satu destinasi wisata unik di Jawa Barat — penangkaran buaya terbesar di pesisir utara Subang.',
                'image' => 'https://images.unsplash.com/photo-1559827291-72ee739d0d9a?w=1400&q=80',
                'button_text' => 'Lihat Potensi',
                'button_link' => '/potensi',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Produk Unggulan Blanakan',
                'subtitle' => 'Udang segar, ikan bandeng, dan berbagai hasil laut berkualitas langsung dari dermaga Blanakan.',
                'image' => 'https://images.unsplash.com/photo-1498654200943-1088dd4438ae?w=1400&q=80',
                'button_text' => 'Kenali Potensi',
                'button_link' => '/potensi',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(['title' => $slider['title']], $slider);
        }
    }
}
