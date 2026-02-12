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
            [
                'title' => 'Pendidikan Karakter Anak Usia Dini',
                'description' => 'Menanamkan nilai-nilai karakter pada anak usia dini melalui kegiatan pembiasaan dan keteladanan.',
                'file_path' => 'digital-books/pendidikan-karakter.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Literasi Digital untuk Guru PAUD',
                'description' => 'Panduan pemanfaatan teknologi digital dalam pembelajaran PAUD secara bijak dan efektif.',
                'file_path' => 'digital-books/literasi-digital.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Pembelajaran Sains Sederhana di PAUD',
                'description' => 'Eksperimen sains sederhana yang bisa dilakukan di PAUD untuk menumbuhkan rasa ingin tahu anak.',
                'file_path' => 'digital-books/sains-sederhana.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Kolaborasi Sekolah dan Keluarga di PAUD',
                'description' => 'Membangun kemitraan efektif antara sekolah PAUD dan keluarga untuk mendukung tumbuh kembang anak.',
                'file_path' => 'digital-books/kolaborasi-keluarga.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Manajemen PAUD Holistik Integratif',
                'description' => 'Panduan manajemen lembaga PAUD yang holistik, mencakup aspek kesehatan, gizi, perlindungan, dan pendidikan.',
                'file_path' => 'digital-books/manajemen-paud.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Deteksi Dini Tumbuh Kembang Anak',
                'description' => 'Panduan deteksi dini gangguan tumbuh kembang anak dan langkah-langkah intervensi yang tepat.',
                'file_path' => 'digital-books/deteksi-dini.pdf',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
        ];

        foreach ($books as $book) {
            DigitalBook::updateOrCreate(['title' => $book['title']], $book);
        }
    }
}
