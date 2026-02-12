<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 16; $i++) {
            Gallery::updateOrCreate(
                ['title' => "Dokumentasi Kegiatan BASIRU $i"],
                [
                    'image_path' => "galleries/gambar$i.jpg",
                    'description' => "Dokumentasi kegiatan pengembangan kompetensi guru PAUD - Foto $i",
                    'order' => $i,
                    'is_active' => true,
                ]
            );
        }
    }
}
