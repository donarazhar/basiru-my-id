<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::updateOrCreate(
            ['title' => 'Quiz Pengembangan Kompetensi Guru'],
            [
                'description' => 'Quiz refleksi untuk mengukur pemahaman materi pengembangan kompetensi guru PAUD',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => true,
            ]
        );
    }
}
