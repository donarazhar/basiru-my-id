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
</ol>',
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
</ol>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Kolaborasi Orang Tua dan Guru dalam PAUD',
                'content' => '<h3>Pentingnya Kolaborasi</h3>
<p>Keberhasilan pendidikan anak usia dini sangat bergantung pada kerjasama yang baik antara orang tua dan guru.</p>

<h3>Bentuk-bentuk Kolaborasi</h3>
<ul>
<li><strong>Komunikasi Rutin</strong> - Laporan harian melalui buku penghubung atau aplikasi</li>
<li><strong>Parenting Class</strong> - Pertemuan berkala untuk berbagi strategi pengasuhan</li>
<li><strong>Kegiatan Bersama</strong> - Melibatkan orang tua dalam kegiatan sekolah</li>
<li><strong>Home Visit</strong> - Kunjungan guru ke rumah untuk memahami lingkungan anak</li>
</ul>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Pendekatan STEAM untuk Anak Usia Dini',
                'content' => '<h3>Apa itu STEAM?</h3>
<p>STEAM adalah pendekatan pembelajaran yang mengintegrasikan Science, Technology, Engineering, Arts, dan Mathematics secara holistik untuk anak usia dini.</p>

<h3>Contoh Kegiatan</h3>
<ul>
<li><strong>Eksperimen Sederhana</strong> - Mengamati perubahan warna saat mencampur cat</li>
<li><strong>Konstruksi</strong> - Membangun menara dari balok kayu</li>
<li><strong>Seni</strong> - Membuat kolase dari bahan alam</li>
</ul>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Asesmen Autentik di PAUD',
                'content' => '<h3>Pengertian</h3>
<p>Asesmen autentik adalah penilaian yang dilakukan secara alamiah dalam konteks kegiatan sehari-hari anak di sekolah.</p>

<h3>Teknik Asesmen</h3>
<ol>
<li><strong>Observasi</strong> - Mengamati perilaku anak saat bermain dan belajar</li>
<li><strong>Portofolio</strong> - Mengumpulkan hasil karya anak secara berkala</li>
<li><strong>Catatan Anekdotal</strong> - Mencatat peristiwa penting perkembangan anak</li>
</ol>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
            [
                'title' => 'Pengelolaan Kelas Inklusif di PAUD',
                'content' => '<h3>Pendahuluan</h3>
<p>Pendidikan inklusif memberikan kesempatan bagi semua anak, termasuk anak berkebutuhan khusus, untuk belajar bersama dalam satu kelas.</p>

<h3>Strategi Pengelolaan</h3>
<ul>
<li><strong>Modifikasi Lingkungan</strong> - Sesuaikan ruang kelas agar aksesibel untuk semua anak</li>
<li><strong>Diferensiasi Pembelajaran</strong> - Sesuaikan metode dan materi sesuai kebutuhan individu</li>
<li><strong>Kolaborasi Tim</strong> - Bekerja sama dengan psikolog, terapis, dan orang tua</li>
</ul>',
                'author' => 'Nila Fitria',
                'is_active' => true,
            ],
        ];

        foreach ($practices as $practice) {
            BestPractice::updateOrCreate(['title' => $practice['title']], $practice);
        }
    }
}
