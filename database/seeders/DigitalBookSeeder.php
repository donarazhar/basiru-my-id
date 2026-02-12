<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DigitalBook;

class DigitalBookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'Panduan Pembelajaran PAUD Berbasis Bermain',
                'description' => 'Buku panduan lengkap tentang metode pembelajaran berbasis bermain untuk anak usia dini, mencakup teori dan praktik implementasi.',
                'file_path' => 'digital-books/panduan-bermain.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Kurikulum Merdeka untuk PAUD',
                'description' => 'Memahami implementasi Kurikulum Merdeka di jenjang PAUD, termasuk profil pelajar Pancasila dan asesmen formatif.',
                'file_path' => 'digital-books/kurikulum-merdeka.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Stimulasi Perkembangan Anak Usia Dini',
                'description' => 'Panduan stimulasi 6 aspek perkembangan anak: kognitif, bahasa, fisik-motorik, sosial-emosional, seni, dan nilai agama & moral.',
                'file_path' => 'digital-books/stimulasi-perkembangan.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Asesmen Perkembangan Anak di PAUD',
                'description' => 'Teknik dan instrumen asesmen perkembangan anak usia dini yang valid dan reliabel untuk guru PAUD.',
                'file_path' => 'digital-books/asesmen-perkembangan.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Pengelolaan Kelas yang Efektif di PAUD',
                'description' => 'Strategi pengelolaan kelas yang menciptakan lingkungan belajar kondusif dan menyenangkan bagi anak usia dini.',
                'file_path' => 'digital-books/pengelolaan-kelas.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Media Pembelajaran Kreatif untuk PAUD',
                'description' => 'Kumpulan ide dan tutorial pembuatan media pembelajaran kreatif dari bahan sederhana untuk kegiatan belajar di PAUD.',
                'file_path' => 'digital-books/media-kreatif.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
        ];

        foreach ($books as $book) {
            DigitalBook::updateOrCreate(['title' => $book['title']], $book);
        }
    }
}
