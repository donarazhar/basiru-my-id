<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Define all available settings with their defaults and types.
     */
    private function getSettingsConfig(): array
    {
        return [
            // Site Identity
            'site_title'       => ['default' => 'BASIRU - Pengembangan Kompetensi Guru', 'type' => 'text'],
            'site_description' => ['default' => 'BASIRU - Pengembangan Kompetensi Guru PAUD', 'type' => 'text'],
            'site_logo'        => ['default' => '', 'type' => 'image'],
            'site_favicon'     => ['default' => '', 'type' => 'image'],

            // Hero Section
            'hero_heading'     => ['default' => 'BASIRU', 'type' => 'text'],
            'hero_subheading'  => ['default' => 'PENGEMBANGAN KOMPETENSI GURU', 'type' => 'text'],
            'hero_motto'       => ['default' => '"Aku bukan hanya mengajar, aku sedang menanam masa depan"', 'type' => 'text'],

            // Contact & Social
            'contact_email'    => ['default' => 'info@basiru.my.id', 'type' => 'text'],
            'youtube_url'      => ['default' => 'https://www.youtube.com/@nilafitria2119/videos', 'type' => 'text'],
            'facebook_url'     => ['default' => '#', 'type' => 'text'],
            'twitter_url'      => ['default' => '#', 'type' => 'text'],
            'linkedin_url'     => ['default' => '#', 'type' => 'text'],
            'instagram_url'    => ['default' => '#', 'type' => 'text'],

            // Footer
            'footer_org'       => ['default' => 'PG PAUD', 'type' => 'text'],
            'footer_address'   => ['default' => 'UNIVERSITAS NEGERI JAKARTA, Rawamangun Jakarta Timur', 'type' => 'textarea'],
            'footer_about'     => ['default' => 'BASIRU, dibuat untuk para praktisi PAUD', 'type' => 'textarea'],
            'footer_copyright' => ['default' => 'Nila Fitria 2023', 'type' => 'text'],
        ];
    }

    /**
     * Show the settings form
     */
    public function edit()
    {
        $config = $this->getSettingsConfig();
        $settings = [];

        foreach ($config as $key => $meta) {
            $settings[$key] = SiteSetting::getValue($key, $meta['default']);
        }

        return view('admin.site-settings', compact('settings'));
    }

    /**
     * Update the settings
     */
    public function update(Request $request)
    {
        $config = $this->getSettingsConfig();

        foreach ($config as $key => $meta) {
            if ($meta['type'] === 'image') {
                // Handle file uploads
                if ($request->hasFile($key)) {
                    $file = $request->file($key);

                    // Validate image
                    $request->validate([
                        $key => 'image|mimes:jpeg,png,gif,ico,svg,webp|max:2048',
                    ]);

                    // Delete old file if exists
                    $oldPath = SiteSetting::getValue($key);
                    if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }

                    // Store new file
                    $path = $file->store('settings', 'public');
                    SiteSetting::setValue($key, $path);
                }
            } else {
                // Handle text inputs
                SiteSetting::setValue($key, $request->input($key, $meta['default']));
            }
        }

        return redirect()->route('admin.site-settings.edit')
            ->with('success', 'Pengaturan situs berhasil diperbarui!');
    }
}
