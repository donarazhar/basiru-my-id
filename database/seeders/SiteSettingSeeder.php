<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_title'       => 'BASIRU - Pengembangan Kompetensi Guru',
            'site_description' => 'BASIRU - Pengembangan Kompetensi Guru PAUD',
            'hero_heading'     => 'BASIRU',
            'hero_subheading'  => 'PENGEMBANGAN KOMPETENSI GURU',
            'hero_motto'       => '"Aku bukan hanya mengajar, aku sedang menanam masa depan"',
            'contact_email'    => 'info@basiru.my.id',
            'youtube_url'      => 'https://www.youtube.com/@nilafitria2119/videos',
            'facebook_url'     => '#',
            'twitter_url'      => '#',
            'linkedin_url'     => '#',
            'instagram_url'    => '#',
            'footer_org'       => 'PG PAUD',
            'footer_address'   => "UNIVERSITAS NEGERI JAKARTA\nRawamangun Jakarta Timur",
            'footer_about'     => 'BASIRU, dibuat untuk para praktisi PAUD',
            'footer_copyright' => 'Nila Fitria',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
