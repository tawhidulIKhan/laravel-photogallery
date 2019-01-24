<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'key' => 'site_title',
            'display_name' => 'Site Title',
            'slug' => str_slug('Site Title'),
            'value' => 'PhotoGallery',
        ]);

        Setting::create([
            'key' => 'site_copyright',
            'display_name' => 'Copyright Text',
            'slug' => str_slug('Copyright Text'),
            'value' => 'Backend By @ <a href="https://github.com/tawhid-coder" target="_blank">
            Tawhidul Islam Khan</a>',
        ]);

    }
}
