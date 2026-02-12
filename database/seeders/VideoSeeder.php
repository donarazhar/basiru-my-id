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
            ['title' => 'Video Pembelajaran 7', 'youtube_url' => 'https://www.youtube.com/embed/XfPD3FtNKoY', 'order' => 7],
            ['title' => 'Video Pembelajaran 8', 'youtube_url' => 'https://www.youtube.com/embed/UPD1n5RPwhc', 'order' => 8],
            ['title' => 'Video Pembelajaran 9', 'youtube_url' => 'https://www.youtube.com/embed/iwhlHWqlXio', 'order' => 9],
            ['title' => 'Video Pembelajaran 10', 'youtube_url' => 'https://www.youtube.com/embed/T-BvVkdje7E', 'order' => 10],
            ['title' => 'Video Pembelajaran 11', 'youtube_url' => 'https://www.youtube.com/embed/VP_t7oGF1q8', 'order' => 11],
            ['title' => 'Video Pembelajaran 12', 'youtube_url' => 'https://www.youtube.com/embed/k1sNl_YRN7Q', 'order' => 12],
            ['title' => 'Video Pembelajaran 13', 'youtube_url' => 'https://www.youtube.com/embed/QMYj2Dcqe74', 'order' => 13],
            ['title' => 'Video Pembelajaran 14', 'youtube_url' => 'https://www.youtube.com/embed/_SSRfWVE41A', 'order' => 14],
            ['title' => 'Playlist Video Pembelajaran', 'youtube_url' => 'https://www.youtube.com/embed/videoseries?list=PLSVFfypFuo_orkG1mqjMx1uRZOdnaiGyZ', 'order' => 15],
        ];

        foreach ($videos as $video) {
            Video::updateOrCreate(['youtube_url' => $video['youtube_url']], $video);
        }
    }
}
