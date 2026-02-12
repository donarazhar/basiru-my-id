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
        ];

        foreach ($contacts as $contact) {
            Contact::updateOrCreate(
                ['email' => $contact['email'], 'message' => $contact['message']],
                $contact
            );
        }
    }
}
