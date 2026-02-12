<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LibraryItem;

class LibraryItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Modul Pelatihan Guru PAUD Profesional',
                'description' => 'Modul lengkap pelatihan untuk meningkatkan kompetensi profesional guru PAUD sesuai standar nasional.',
                'file_path' => 'library/modul-pelatihan-guru.pdf',
                'category' => 'Modul',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Jurnal: Pendekatan Montessori di Indonesia',
                'description' => 'Penelitian tentang efektivitas pendekatan Montessori yang diadaptasi untuk konteks pendidikan anak usia dini di Indonesia.',
                'file_path' => 'library/jurnal-montessori.pdf',
                'category' => 'Jurnal',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Panduan RPPH Kurikulum Merdeka',
                'description' => 'Template dan contoh Rencana Pelaksanaan Pembelajaran Harian (RPPH) sesuai Kurikulum Merdeka untuk PAUD.',
                'file_path' => 'library/panduan-rpph.pdf',
                'category' => 'Panduan',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Instrumen Observasi Perkembangan Anak',
                'description' => 'Kumpulan instrumen observasi terstandar untuk memantau perkembangan anak pada semua aspek.',
                'file_path' => 'library/instrumen-observasi.pdf',
                'category' => 'Instrumen',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Jurnal: Bermain Peran dalam Perkembangan Sosial',
                'description' => 'Studi pengaruh bermain peran terhadap perkembangan sosial-emosional anak usia 4-6 tahun.',
                'file_path' => 'library/jurnal-bermain-peran.pdf',
                'category' => 'Jurnal',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Modul Pengembangan Bahasa Anak',
                'description' => 'Modul pelatihan pengembangan kemampuan bahasa dan literasi awal pada anak usia dini.',
                'file_path' => 'library/modul-bahasa-anak.pdf',
                'category' => 'Modul',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Panduan APE (Alat Permainan Edukatif)',
                'description' => 'Panduan pembuatan dan penggunaan Alat Permainan Edukatif dari bahan lokal untuk pembelajaran PAUD.',
                'file_path' => 'library/panduan-ape.pdf',
                'category' => 'Panduan',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Jurnal: Kesiapan Sekolah Anak PAUD',
                'description' => 'Penelitian tentang faktor-faktor kesiapan sekolah anak yang mengikuti program PAUD.',
                'file_path' => 'library/jurnal-kesiapan-sekolah.pdf',
                'category' => 'Jurnal',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Modul Pembelajaran STEAM di PAUD',
                'description' => 'Panduan implementasi pendekatan STEAM (Science, Technology, Engineering, Arts, Mathematics) untuk anak usia dini.',
                'file_path' => 'library/modul-steam-paud.pdf',
                'category' => 'Modul',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Panduan Pengelolaan Perpustakaan PAUD',
                'description' => 'Tips dan panduan mengelola perpustakaan ramah anak di lembaga PAUD.',
                'file_path' => 'library/panduan-perpustakaan.pdf',
                'category' => 'Panduan',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Jurnal: Peran Orang Tua dalam Pendidikan Anak',
                'description' => 'Tinjauan literatur tentang keterlibatan orang tua dan dampaknya terhadap prestasi belajar anak usia dini.',
                'file_path' => 'library/jurnal-peran-orangtua.pdf',
                'category' => 'Jurnal',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Modul Seni Rupa untuk Anak Usia Dini',
                'description' => 'Kegiatan seni rupa yang sesuai tahap perkembangan anak untuk mengembangkan kreativitas dan ekspresi diri.',
                'file_path' => 'library/modul-seni-rupa.pdf',
                'category' => 'Modul',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
        ];

        foreach ($items as $item) {
            LibraryItem::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
