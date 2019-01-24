<?php

use App\ContactInfo;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class contactinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        ContactInfo::create([
            'title' => 'Phone',
            'slug' => 'phone',
            'description' => $faker->phoneNumber      
        ]);

        ContactInfo::create([
            'title' => 'Email',
            'slug' => 'email',
            'description' => $faker->email      
        ]);

        ContactInfo::create([
            'title' => 'Address',
            'slug' => 'address',
            'description' => $faker->address      
        ]);
    
    }
}
