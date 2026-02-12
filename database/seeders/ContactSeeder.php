<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@gmail.com',
                'phone' => '081234567890',
                'message' => 'Assalamualaikum, saya ingin bertanya mengenai jadwal pelatihan guru PAUD tahun ini. Apakah ada pelatihan yang akan diadakan dalam waktu dekat? Terima kasih.',
                'is_read' => true,
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@yahoo.com',
                'phone' => '082345678901',
                'message' => 'Selamat pagi, saya tertarik dengan program pengembangan kompetensi guru PAUD. Bagaimana cara mendaftar? Mohon informasinya.',
                'is_read' => true,
            ],
            [
                'name' => 'Dewi Rahmawati',
                'email' => 'dewi.rahma@gmail.com',
                'phone' => '083456789012',
                'message' => 'Saya sudah mengikuti pelatihan BASIRU dan sangat bermanfaat. Apakah ada sertifikat untuk peserta? Terima kasih.',
                'is_read' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@outlook.com',
                'phone' => '084567890123',
                'message' => 'Halo, saya kepala sekolah PAUD di Jakarta Timur. Kami ingin mengundang tim BASIRU untuk workshop di sekolah kami. Bagaimana prosedurnya?',
                'is_read' => false,
            ],
            [
                'name' => 'Rina Marlina',
                'email' => 'rina.marlina@gmail.com',
                'phone' => '085678901234',
                'message' => 'Assalamualaikum, apakah buku digital BASIRU bisa diunduh gratis? Saya sangat membutuhkan referensi untuk pembelajaran di kelas.',
                'is_read' => false,
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra.wijaya@gmail.com',
                'phone' => '086789012345',
                'message' => 'Saya ingin berkontribusi menulis artikel praktik baik untuk website BASIRU. Bagaimana caranya? Mohon informasi lebih lanjut.',
                'is_read' => false,
            ],
            [
                'name' => 'Fitri Handayani',
                'email' => 'fitri.handayani@yahoo.com',
                'phone' => '087890123456',
                'message' => 'Video pembelajaran di BASIRU sangat membantu. Apakah ada rencana menambah video tentang pembelajaran sensorik? Terima kasih.',
                'is_read' => false,
            ],
            [
                'name' => 'Muhammad Rizki',
                'email' => 'mrizki@gmail.com',
                'phone' => '088901234567',
                'message' => 'Selamat siang, saya mahasiswa PGPAUD semester 6. Apakah BASIRU menerima mahasiswa magang untuk program penelitian? Mohon infonya.',
                'is_read' => false,
            ],
            [
                'name' => 'Nurul Hidayah',
                'email' => 'nurul.hidayah@gmail.com',
                'phone' => null,
                'message' => 'Saya guru PAUD di Bekasi. Apakah quiz di website ini bisa digunakan untuk asesmen di sekolah kami? Bagaimana cara mengaksesnya?',
                'is_read' => false,
            ],
            [
                'name' => 'Agus Prasetyo',
                'email' => 'agus.prasetyo@gmail.com',
                'phone' => '089012345678',
                'message' => 'Website BASIRU sangat informatif! Apakah ada newsletter bulanan yang bisa saya langganan untuk update terbaru?',
                'is_read' => false,
            ],
            [
                'name' => 'Lina Kartika',
                'email' => 'lina.kartika@gmail.com',
                'phone' => '081122334455',
                'message' => 'Assalamualaikum, saya ingin mengetahui lebih lanjut mengenai perpustakaan digital BASIRU. Apakah semua dokumen bisa diakses secara gratis?',
                'is_read' => false,
            ],
            [
                'name' => 'Wahyu Setiawan',
                'email' => 'wahyu.s@gmail.com',
                'phone' => '082233445566',
                'message' => 'Bagus sekali program BASIRU ini. Apakah ada cabang atau mitra di kota Bandung? Kami ingin bekerja sama untuk kegiatan pelatihan guru.',
                'is_read' => false,
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::updateOrCreate(
                ['email' => $contact['email'], 'message' => $contact['message']],
                $contact
            );
        }
    }
}
