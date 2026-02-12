<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = [
            [
                'title' => 'Quiz Pengembangan Kompetensi Guru',
                'description' => 'Quiz refleksi untuk mengukur pemahaman materi pengembangan kompetensi guru PAUD',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => true,
            ],
            [
                'title' => 'Quiz Kurikulum Merdeka PAUD',
                'description' => 'Uji pemahaman Anda tentang implementasi Kurikulum Merdeka di jenjang PAUD',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => true,
            ],
            [
                'title' => 'Quiz Pembelajaran Berbasis Bermain',
                'description' => 'Evaluasi pemahaman tentang strategi pembelajaran berbasis bermain untuk anak usia dini',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => true,
            ],
            [
                'title' => 'Quiz Asesmen Perkembangan Anak',
                'description' => 'Quiz tentang teknik dan instrumen asesmen perkembangan anak usia dini',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => true,
            ],
            [
                'title' => 'Quiz Pengelolaan Kelas PAUD',
                'description' => 'Uji pengetahuan tentang strategi pengelolaan kelas yang efektif di PAUD',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => false,
            ],
            [
                'title' => 'Quiz Media Pembelajaran Kreatif',
                'description' => 'Evaluasi pemahaman tentang pembuatan dan penggunaan media pembelajaran kreatif',
                'google_form_url' => 'https://docs.google.com/forms/d/e/1FAIpQLSdp4fvs2WA70L8E_zpOo77g1zpbhJB3C_DaVVt52hq_S9vTLQ/viewform?embedded=true',
                'is_active' => false,
            ],
        ];

        foreach ($quizzes as $quiz) {
            Quiz::updateOrCreate(['title' => $quiz['title']], $quiz);
        }
    }
}
