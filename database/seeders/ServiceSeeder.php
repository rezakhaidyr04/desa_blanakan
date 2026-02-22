<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Pembuatan e-KTP',
                'slug' => 'pembuatan-ektp',
                'icon' => 'id-card',
                'description' => 'Layanan pembuatan Kartu Tanda Penduduk Elektronik (e-KTP) untuk warga yang belum memiliki atau perlu memperbarui KTP.',
                'requirements' => "1. Fotokopi Kartu Keluarga (KK)\n2. Surat Pengantar RT/RW\n3. Berusia 17 tahun ke atas\n4. Foto terbaru (akan diambil di kantor desa)",
                'procedure' => "1. Ambil nomor antrian di kantor desa\n2. Serahkan persyaratan kepada petugas\n3. Lakukan perekaman data biometrik\n4. Tunggu penerbitan e-KTP (3-7 hari kerja)",
                'duration' => '3-7 hari kerja',
                'cost' => 'Gratis',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Kartu Keluarga (KK)',
                'slug' => 'kartu-keluarga',
                'icon' => 'users',
                'description' => 'Layanan penerbitan dan pembaruan Kartu Keluarga untuk warga Desa Blanakan.',
                'requirements' => "1. Surat Pengantar RT/RW\n2. KK Lama (jika pembaruan)\n3. Buku Nikah atau Akta Cerai\n4. Dokumen pendukung lainnya sesuai keperluan",
                'procedure' => "1. Siapkan seluruh persyaratan\n2. Datang ke kantor desa dan mengisi formulir\n3. Serahkan berkas kepada petugas\n4. Tunggu proses verifikasi dan penerbitan (2-5 hari kerja)",
                'duration' => '2-5 hari kerja',
                'cost' => 'Gratis',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Akta Kelahiran',
                'slug' => 'akta-kelahiran',
                'icon' => 'document',
                'description' => 'Pengurusan akta kelahiran untuk bayi yang baru lahir atau warga yang belum memiliki akta kelahiran.',
                'requirements' => "1. Surat Keterangan Lahir dari Bidan/Rumah Sakit\n2. Fotokopi KK dan KTP kedua orang tua\n3. Buku Nikah orang tua\n4. 2 lembar foto 4x6 orang tua",
                'procedure' => "1. Siapkan surat keterangan lahir dari bidan atau rumah sakit\n2. Datang ke kantor desa dengan membawa persyaratan lengkap\n3. Petugas akan memproses dan meneruskan ke Dinas Kependudukan\n4. Akta diterbitkan oleh Dinas Catatan Sipil (7-14 hari kerja)",
                'duration' => '7-14 hari kerja',
                'cost' => 'Gratis',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan (SKCK)',
                'slug' => 'surat-keterangan-catatan-kepolisian',
                'icon' => 'shield',
                'description' => 'Surat Keterangan Catatan Kepolisian (SKCK) diperlukan untuk berbagai keperluan seperti melamar pekerjaan, pendidikan, dan lainnya.',
                'requirements' => "1. Fotokopi KTP\n2. Fotokopi Kartu Keluarga\n3. Pas Foto 4x6 sebanyak 2 lembar (latar belakang merah)\n4. Surat Pengantar dari RT/RW yang dilegalisir kelurahan",
                'procedure' => "1. Urus surat pengantar RT/RW terlebih dahulu\n2. Datang ke kantor desa untuk legalisasi\n3. Bawa surat pengantar ke Polsek setempat\n4. SKCK diterbitkan di Polsek (1-3 hari kerja)",
                'duration' => '1-3 hari kerja',
                'cost' => 'Gratis (biaya PNBP di Polsek)',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Pengantar',
                'slug' => 'surat-pengantar',
                'icon' => 'mail',
                'description' => 'Surat pengantar dari desa untuk berbagai keperluan seperti bank, sekolah, instansi pemerintah, dan lainnya.',
                'requirements' => "1. KTP asli\n2. Kartu Keluarga\n3. Menjelaskan keperluan surat",
                'procedure' => "1. Datang ke kantor desa\n2. Jelaskan keperluan surat kepada petugas\n3. Surat dapat langsung diproses hari itu juga",
                'duration' => 'Sehari jadi',
                'cost' => 'Gratis',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'slug' => 'surat-keterangan-tidak-mampu',
                'icon' => 'heart',
                'description' => 'Surat Keterangan Tidak Mampu (SKTM) untuk warga yang memerlukan bantuan dalam mengakses layanan kesehatan, pendidikan, dan sosial.',
                'requirements' => "1. KTP dan KK\n2. Surat pengantar dari RT/RW\n3. Dokumen pendukung kondisi ekonomi",
                'procedure' => "1. Minta surat pengantar dari RT/RW\n2. Datang ke kantor desa dengan KTP dan KK\n3. Petugas akan melakukan verifikasi\n4. Surat diterbitkan setelah verifikasi (1-2 hari kerja)",
                'duration' => '1-2 hari kerja',
                'cost' => 'Gratis',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
