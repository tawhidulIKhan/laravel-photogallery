<?php

use App\Team;
use App\Service;
use App\ContactInfo;
use Illuminate\Database\Seeder;
use LaratrustSeeder as LaratrustSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(PhotoTableSeeder::class);
        $this->call(contactinfoTableSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(SettingTableSeeder::class);
        factory(Service::class,3)->create();
    }
}
