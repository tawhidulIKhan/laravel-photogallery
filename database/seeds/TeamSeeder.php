<?php

use App\Team;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Team::create([
            'thumbnail' => $faker->imageUrl(400,300,'people'),
            'name' => 'John Doe',
            'slug' => str_slug('John Doe'),
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt alias animi cupiditate.'
        ]);

        Team::create([
            'thumbnail' => $faker->imageUrl(400,300,'people'),
            'name' => 'John Rosella',
            'slug' => str_slug('John Rosella'),
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt alias animi cupiditate.'
        ]);

        Team::create([
            'thumbnail' => $faker->imageUrl(400,300,'people'),
            'name' => 'John Foo',
            'slug' => str_slug('John Foo'),
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt alias animi cupiditate.'
        ]);
        //
    }


}
