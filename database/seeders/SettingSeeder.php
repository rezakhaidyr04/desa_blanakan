<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'Desa Blanakan',
                'type' => 'text',
                'group' => 'general',
            ],
            [
                'key' => 'site_description',
                'value' => 'Portal Resmi Pemerintah Desa Blanakan — Pusat informasi, pelayanan publik, dan potensi desa di pesisir utara Kabupaten Subang, Jawa Barat. Melayani dengan sepenuh hati untuk kesejahteraan warga.',
                'type' => 'textarea',
                'group' => 'general',
            ],
            [
                'key' => 'logo',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
            ],
            [
                'key' => 'favicon',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
            ],
            
            // Contact Settings
            [
                'key' => 'address',
                'value' => 'Jl. Raya Blanakan No. 1, Desa Blanakan, Kecamatan Blanakan, Kabupaten Subang, Provinsi Jawa Barat 41259',
                'type' => 'textarea',
                'group' => 'contact',
            ],
            [
                'key' => 'phone',
                'value' => '(0260) 461234',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'email',
                'value' => 'pemdes.blanakan@subang.go.id',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'whatsapp',
                'value' => '6281234567890',
                'type' => 'text',
                'group' => 'contact',
            ],
            
            // Social Media Settings
            [
                'key' => 'facebook',
                'value' => 'https://facebook.com/desablanakan.subang',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'instagram',
                'value' => 'https://instagram.com/desablanakan.official',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'youtube',
                'value' => 'https://youtube.com/@desablanakan',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'twitter',
                'value' => 'https://twitter.com/desablanakan',
                'type' => 'text',
                'group' => 'social',
            ],
            
            // About Settings
            [
                'key' => 'about_title',
                'value' => 'Mengenal Desa Blanakan',
                'type' => 'text',
                'group' => 'about',
            ],
            [
                'key' => 'about_description',
                'value' => 'Desa Blanakan merupakan salah satu permata di pesisir utara Kabupaten Subang, Jawa Barat. Terletak di bibir laut Jawa, desa kami menyimpan kekayaan alam yang luar biasa — mulai dari hamparan tambak dan sawah yang hijau, hasil laut yang melimpah, hingga ekosistem mangrove yang menjadi rumah bagi beragam satwa. Dengan semangat gotong royong dan kearifan lokal yang turun-temurun, masyarakat Blanakan terus bergerak maju membangun desa yang sejahtera, berdaya saing, dan ramah bagi siapa saja yang berkunjung.',
                'type' => 'textarea',
                'group' => 'about',
            ],
            [
                'key' => 'vision',
                'value' => 'Terwujudnya Desa Blanakan sebagai desa maritim dan agraris yang maju, mandiri, sejahtera, dan berbudaya menuju masyarakat yang berkualitas dan berdaya saing tinggi.',
                'type' => 'textarea',
                'group' => 'about',
            ],
            [
                'key' => 'mission',
                'value' => "1. Memberikan pelayanan publik yang cepat, ramah, transparan, dan berbasis teknologi digital\n2. Mengoptimalkan potensi kelautan, perikanan, dan pertanian sebagai penggerak ekonomi desa\n3. Meningkatkan kualitas sumber daya manusia melalui program pendidikan, pelatihan, dan pemberdayaan masyarakat\n4. Membangun infrastruktur desa yang berkualitas, merata, dan berwawasan lingkungan\n5. Melestarikan nilai-nilai budaya, kearifan lokal, dan kerukunan antar warga\n6. Mengembangkan pariwisata berbasis alam dan edukasi untuk kesejahteraan masyarakat",
                'type' => 'textarea',
                'group' => 'about',
            ],
            
            // Statistics
            [
                'key' => 'population',
                'value' => '12.847',
                'type' => 'text',
                'group' => 'stats',
            ],
            [
                'key' => 'area',
                'value' => '1.856 Ha',
                'type' => 'text',
                'group' => 'stats',
            ],
            [
                'key' => 'households',
                'value' => '3.542',
                'type' => 'text',
                'group' => 'stats',
            ],
            
            // Homepage Settings
            [
                'key' => 'hero_title',
                'value' => 'Selamat Datang di Desa Blanakan',
                'type' => 'text',
                'group' => 'homepage',
            ],
            [
                'key' => 'hero_subtitle',
                'value' => 'Desa Maritim yang Asri, Maju, dan Bersahabat — Tempat di Mana Laut dan Sawah Menyatu dalam Harmoni',
                'type' => 'text',
                'group' => 'homepage',
            ],
            [
                'key' => 'hero_image',
                'value' => null,
                'type' => 'image',
                'group' => 'homepage',
            ],
            
            // Footer Settings
            [
                'key' => 'footer_text',
                'value' => '© 2025 Pemerintah Desa Blanakan — Kecamatan Blanakan, Kabupaten Subang, Jawa Barat. Seluruh hak cipta dilindungi undang-undang.',
                'type' => 'text',
                'group' => 'footer',
            ],
            [
                'key' => 'office_hours',
                'value' => "Senin – Kamis: 08.00 – 15.30 WIB\nJumat: 08.00 – 11.00 WIB\nSabtu, Minggu & Hari Libur Nasional: Tutup",
                'type' => 'textarea',
                'group' => 'footer',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
