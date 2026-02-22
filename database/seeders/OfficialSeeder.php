<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Official;

class OfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            [
                'name' => 'H. Sudirman, S.IP',
                'position' => 'Kepala Desa',
                'phone' => '081234567890',
                'email' => 'kepala@blanakan.desa.id',
                'bio' => 'Kepala Desa Blanakan periode 2021-2027. Berpengalaman dalam bidang pemerintahan desa selama 15 tahun.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Drs. Agus Santoso',
                'position' => 'Sekretaris Desa',
                'phone' => '081234567891',
                'email' => 'sekdes@blanakan.desa.id',
                'bio' => 'Sekretaris Desa yang berpengalaman dalam administrasi pemerintahan desa.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Ibu Siti Rahayu, A.Md',
                'position' => 'Kaur Keuangan',
                'phone' => '081234567892',
                'email' => 'keuangan@blanakan.desa.id',
                'bio' => 'Bertanggung jawab atas pengelolaan keuangan desa dan laporan anggaran.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Bapak Hendra Wijaya',
                'position' => 'Kaur Perencanaan',
                'phone' => '081234567893',
                'email' => null,
                'bio' => 'Mengelola perencanaan pembangunan dan program kerja desa.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Ibu Dewi Puspitasari',
                'position' => 'Kasi Pelayanan',
                'phone' => '081234567894',
                'email' => null,
                'bio' => 'Melayani kebutuhan administrasi dan dokumen kependudukan warga.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Bapak Ruslan Effendi',
                'position' => 'Kasi Kesejahteraan',
                'phone' => '081234567895',
                'email' => null,
                'bio' => 'Menangani bidang kesejahteraan sosial dan pemberdayaan masyarakat.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Bapak Ahmad Fauzi',
                'position' => 'Kadus 1 (Blok Pantai)',
                'phone' => '081234567896',
                'email' => null,
                'bio' => 'Kepala dusun wilayah blok pantai yang mengkoordinasikan warga setempat.',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Bapak Subhan Nurrohman',
                'position' => 'Kadus 2 (Blok Sawah)',
                'phone' => '081234567897',
                'email' => null,
                'bio' => 'Kepala dusun wilayah blok sawah yang mengkoordinasikan kegiatan pertanian warga.',
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($officials as $official) {
            Official::updateOrCreate(['name' => $official['name']], $official);
        }
    }
}
