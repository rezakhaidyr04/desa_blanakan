<?php

namespace Database\Seeders;

use App\Models\Finance;
use Illuminate\Database\Seeder;

class FinanceSeeder extends Seeder
{
    public function run(): void
    {
        Finance::truncate();

        $data = [
            // ══════════════════════════════════════════════
            // TAHUN 2025
            // ══════════════════════════════════════════════

            // PENDAPATAN
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Pendapatan Asli Desa', 'item' => 'Hasil Usaha Desa (BUMDes)',      'budget' => 45000000,   'realization' => 38500000,  'order' => 1],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Pendapatan Asli Desa', 'item' => 'Hasil Aset Desa (Sewa Tanah)',   'budget' => 12000000,   'realization' => 12000000,  'order' => 2],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Pendapatan Asli Desa', 'item' => 'Swadaya & Partisipasi Masyarakat', 'budget' => 8000000, 'realization' => 6200000,   'order' => 3],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Dana Desa (APBN)',                           'budget' => 1250000000, 'realization' => 1250000000,'order' => 4],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Alokasi Dana Desa (ADD)',                    'budget' => 385000000,  'realization' => 385000000, 'order' => 5],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Bagi Hasil Pajak & Retribusi Daerah',        'budget' => 42000000,   'realization' => 39800000,  'order' => 6],
            ['year' => 2025, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Bantuan Keuangan Kabupaten',                 'budget' => 150000000,  'realization' => 150000000, 'order' => 7],

            // BELANJA
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Penghasilan Tetap & Tunjangan Perangkat', 'budget' => 312000000, 'realization' => 312000000, 'order' => 1],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Operasional Perkantoran Desa',            'budget' => 65000000,  'realization' => 58700000,  'order' => 2],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Sistem Informasi Desa (Website)',         'budget' => 15000000,  'realization' => 14500000,  'order' => 3],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Penyusunan Dokumen Perencanaan APBDes',   'budget' => 8000000,   'realization' => 8000000,   'order' => 4],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Pembangunan/Perbaikan Jalan Desa',        'budget' => 450000000, 'realization' => 423000000, 'order' => 5],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Pembangunan Drainase & Sanitasi',         'budget' => 185000000, 'realization' => 172500000, 'order' => 6],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Pembangunan Posyandu',                    'budget' => 75000000,  'realization' => 75000000,  'order' => 7],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Talud Penahan Tanah',                     'budget' => 120000000, 'realization' => 118000000, 'order' => 8],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembinaan Kemasyarakatan',     'item' => 'Kegiatan PKK & Karang Taruna',            'budget' => 35000000,  'realization' => 31500000,  'order' => 9],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembinaan Kemasyarakatan',     'item' => 'Penyelenggaraan Festival & Keagamaan',    'budget' => 25000000,  'realization' => 22800000,  'order' => 10],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pembinaan Kemasyarakatan',     'item' => 'Pembinaan Linmas & Keamanan',             'budget' => 18000000,  'realization' => 18000000,  'order' => 11],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pemberdayaan Masyarakat',      'item' => 'Pelatihan Usaha Nelayan & Petani',        'budget' => 55000000,  'realization' => 48000000,  'order' => 12],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pemberdayaan Masyarakat',      'item' => 'BLT Dana Desa (BLT-DD)',                  'budget' => 216000000, 'realization' => 216000000, 'order' => 13],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Pemberdayaan Masyarakat',      'item' => 'Pengembangan BUMDes Blanakan',            'budget' => 40000000,  'realization' => 35000000,  'order' => 14],
            ['year' => 2025, 'type' => 'belanja', 'category' => 'Bid. Penanggulangan Bencana',       'item' => 'Operasional Penanganan Bencana Pesisir',  'budget' => 25000000,  'realization' => 15000000,  'order' => 15],

            // PEMBIAYAAN
            ['year' => 2025, 'type' => 'pembiayaan', 'category' => 'Penerimaan Pembiayaan', 'item' => 'Sisa Lebih Perhitungan Anggaran (SiLPA) 2024', 'budget' => 32500000, 'realization' => 32500000, 'order' => 1],
            ['year' => 2025, 'type' => 'pembiayaan', 'category' => 'Pengeluaran Pembiayaan', 'item' => 'Penyertaan Modal BUMDes',                      'budget' => 25000000, 'realization' => 25000000, 'order' => 2],

            // ══════════════════════════════════════════════
            // TAHUN 2024
            // ══════════════════════════════════════════════

            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Pendapatan Asli Desa', 'item' => 'Hasil Usaha Desa (BUMDes)',        'budget' => 38000000,   'realization' => 36200000,   'order' => 1],
            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Pendapatan Asli Desa', 'item' => 'Hasil Aset Desa (Sewa Tanah)',     'budget' => 10000000,   'realization' => 10000000,   'order' => 2],
            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Dana Desa (APBN)',                             'budget' => 1150000000, 'realization' => 1150000000, 'order' => 3],
            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Alokasi Dana Desa (ADD)',                      'budget' => 360000000,  'realization' => 360000000,  'order' => 4],
            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Bagi Hasil Pajak & Retribusi Daerah',          'budget' => 38000000,   'realization' => 37100000,   'order' => 5],
            ['year' => 2024, 'type' => 'pendapatan', 'category' => 'Transfer', 'item' => 'Bantuan Keuangan Kabupaten',                   'budget' => 125000000,  'realization' => 125000000,  'order' => 6],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Penghasilan Tetap & Tunjangan Perangkat', 'budget' => 295000000, 'realization' => 295000000, 'order' => 1],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Penyelenggaraan Pemerintahan', 'item' => 'Operasional Perkantoran Desa',            'budget' => 58000000,  'realization' => 55200000,  'order' => 2],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Pembangunan/Perbaikan Jalan Desa',        'budget' => 420000000, 'realization' => 418000000, 'order' => 3],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Pembangunan Desa',             'item' => 'Pembangunan Drainase & Sanitasi',         'budget' => 165000000, 'realization' => 163000000, 'order' => 4],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Pemberdayaan Masyarakat',      'item' => 'BLT Dana Desa (BLT-DD)',                  'budget' => 192000000, 'realization' => 192000000, 'order' => 5],
            ['year' => 2024, 'type' => 'belanja', 'category' => 'Bid. Pemberdayaan Masyarakat',      'item' => 'Pelatihan Usaha Nelayan & Petani',        'budget' => 48000000,  'realization' => 45000000,  'order' => 6],
            ['year' => 2024, 'type' => 'pembiayaan', 'category' => 'Penerimaan Pembiayaan', 'item' => 'SiLPA 2023',                                      'budget' => 18200000,  'realization' => 18200000,  'order' => 1],
        ];

        foreach ($data as $row) {
            Finance::create(array_merge($row, ['is_active' => true]));
        }
    }
}
