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
        ];

        foreach ($items as $item) {
            LibraryItem::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
