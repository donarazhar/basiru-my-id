<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BestPractice;

class BestPracticeSeeder extends Seeder
{
    public function run(): void
    {
        $practices = [
            [
                'title' => 'Strategi Pembelajaran Berbasis Bermain di PAUD',
                'content' => '<h3>Pendahuluan</h3>
<p>Pembelajaran berbasis bermain merupakan pendekatan yang sangat efektif untuk anak usia dini. Melalui bermain, anak-anak dapat mengembangkan berbagai aspek perkembangan mereka secara holistik.</p>

<h3>Langkah-langkah Implementasi</h3>
<ol>
<li><strong>Persiapan Lingkungan Bermain</strong> - Siapkan area bermain yang aman dan stimulatif</li>
<li><strong>Pemilihan Alat Permainan</strong> - Pilih alat permainan yang sesuai usia dan tujuan pembelajaran</li>
<li><strong>Pelaksanaan</strong> - Biarkan anak bermain secara alami sambil guru memfasilitasi</li>
<li><strong>Refleksi</strong> - Lakukan refleksi bersama anak setelah bermain</li>
</ol>

<h3>Manfaat</h3>
<ul>
<li>Mengembangkan kreativitas anak</li>
<li>Meningkatkan kemampuan sosial-emosional</li>
<li>Menstimulasi perkembangan kognitif</li>
<li>Meningkatkan kemampuan motorik halus dan kasar</li>
</ul>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Penggunaan Media Digital dalam Pembelajaran PAUD',
                'content' => '<h3>Latar Belakang</h3>
<p>Di era digital, penggunaan teknologi dalam pembelajaran PAUD menjadi semakin relevan. Namun perlu diperhatikan prinsip-prinsip penggunaan media digital yang tepat untuk anak usia dini.</p>

<h3>Prinsip Penggunaan Media Digital</h3>
<ol>
<li><strong>Durasi Terbatas</strong> - Maksimal 30 menit per sesi</li>
<li><strong>Konten Edukatif</strong> - Pilih konten yang sesuai dengan kurikulum</li>
<li><strong>Pendampingan</strong> - Guru selalu mendampingi anak saat menggunakan media digital</li>
<li><strong>Interaktif</strong> - Pilih media yang mendorong interaksi dan kreativitas</li>
</ol>

<h3>Contoh Praktik Baik</h3>
<p>Guru menggunakan video animasi pendek untuk memperkenalkan konsep baru, kemudian dilanjutkan dengan kegiatan hands-on untuk memperdalam pemahaman.</p>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Kolaborasi Orang Tua dan Guru dalam PAUD',
                'content' => '<h3>Pentingnya Kolaborasi</h3>
<p>Keberhasilan pendidikan anak usia dini sangat bergantung pada kerjasama yang baik antara orang tua dan guru. Kolaborasi ini menciptakan lingkungan belajar yang konsisten dan mendukung.</p>

<h3>Bentuk-bentuk Kolaborasi</h3>
<ul>
<li><strong>Komunikasi Rutin</strong> - Laporan harian melalui buku penghubung atau aplikasi</li>
<li><strong>Parenting Class</strong> - Pertemuan berkala untuk berbagi strategi pengasuhan</li>
<li><strong>Kegiatan Bersama</strong> - Melibatkan orang tua dalam kegiatan sekolah</li>
<li><strong>Home Visit</strong> - Kunjungan guru ke rumah untuk memahami lingkungan anak</li>
</ul>

<h3>Tips Sukses</h3>
<p>Bangun hubungan yang saling menghargai dan terbuka. Orang tua dan guru memiliki peran yang sama pentingnya dalam tumbuh kembang anak.</p>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
        ];

        foreach ($practices as $practice) {
            BestPractice::updateOrCreate(['title' => $practice['title']], $practice);
        }
    }
}
