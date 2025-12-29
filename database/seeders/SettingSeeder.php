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
                'value' => 'Website Resmi Desa Blanakan - Kecamatan Blanakan, Kabupaten Subang, Jawa Barat',
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
                'value' => 'Jl. Raya Blanakan No. 123, Kecamatan Blanakan, Kabupaten Subang, Jawa Barat 41259',
                'type' => 'textarea',
                'group' => 'contact',
            ],
            [
                'key' => 'phone',
                'value' => '(0260) 123456',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'email',
                'value' => 'info@desablanakan.id',
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
                'value' => 'https://facebook.com/desablanakan',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'instagram',
                'value' => 'https://instagram.com/desablanakan',
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
                'value' => 'Tentang Desa Blanakan',
                'type' => 'text',
                'group' => 'about',
            ],
            [
                'key' => 'about_description',
                'value' => 'Desa Blanakan adalah sebuah desa yang terletak di Kecamatan Blanakan, Kabupaten Subang, Provinsi Jawa Barat. Desa ini memiliki potensi alam yang melimpah, mulai dari pertanian, perikanan, hingga pariwisata pantai yang indah.',
                'type' => 'textarea',
                'group' => 'about',
            ],
            [
                'key' => 'vision',
                'value' => 'Mewujudkan Desa Blanakan yang maju, mandiri, dan sejahtera berbasis potensi lokal dan kearifan budaya.',
                'type' => 'textarea',
                'group' => 'about',
            ],
            [
                'key' => 'mission',
                'value' => "1. Meningkatkan kualitas pelayanan publik yang prima dan transparan\n2. Mengembangkan potensi ekonomi lokal berbasis pertanian dan perikanan\n3. Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan\n4. Membangun infrastruktur desa yang berkualitas dan ramah lingkungan\n5. Melestarikan budaya dan kearifan lokal desa",
                'type' => 'textarea',
                'group' => 'about',
            ],
            
            // Statistics
            [
                'key' => 'population',
                'value' => '15,432',
                'type' => 'text',
                'group' => 'stats',
            ],
            [
                'key' => 'area',
                'value' => '2,534 Ha',
                'type' => 'text',
                'group' => 'stats',
            ],
            [
                'key' => 'households',
                'value' => '4,215',
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
                'value' => 'Desa Pesisir yang Asri dan Sejahtera',
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
                'value' => '© 2024 Desa Blanakan. Hak Cipta Dilindungi.',
                'type' => 'text',
                'group' => 'footer',
            ],
            [
                'key' => 'office_hours',
                'value' => "Senin - Jumat: 08:00 - 16:00 WIB\nSabtu: 08:00 - 12:00 WIB\nMinggu & Hari Libur: Tutup",
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
