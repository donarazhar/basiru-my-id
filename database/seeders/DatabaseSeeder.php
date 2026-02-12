<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            GallerySeeder::class,
            VideoSeeder::class,
            QuizSeeder::class,
            BestPracticeSeeder::class,
            DigitalBookSeeder::class,
            LibraryItemSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
