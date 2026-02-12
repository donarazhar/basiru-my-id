<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            ['title' => 'Keterampilan Mengadakan Variasi', 'youtube_url' => 'https://www.youtube.com/embed/57NBfJYInSE', 'order' => 1],
            ['title' => 'Keterampilan Mengajar Kelompok Kecil', 'youtube_url' => 'https://www.youtube.com/embed/GMz9sjlMFS8', 'order' => 2],
            ['title' => 'Keterampilan Mengelola Kelas', 'youtube_url' => 'https://www.youtube.com/embed/RXG_ol8OWf4', 'order' => 3],
            ['title' => 'Video Pembelajaran 4', 'youtube_url' => 'https://www.youtube.com/embed/6J_p1npZY-E', 'order' => 4],
            ['title' => 'Video Pembelajaran 5', 'youtube_url' => 'https://www.youtube.com/embed/qRDKU902gqk', 'order' => 5],
            ['title' => 'Video Pembelajaran 6', 'youtube_url' => 'https://www.youtube.com/embed/vK-pvkmLRpc', 'order' => 6],
        ];

        foreach ($videos as $video) {
            Video::updateOrCreate(['youtube_url' => $video['youtube_url']], $video);
        }
    }
}
