<?php

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    
    $title = $faker->sentence(3);
    return [
        'thumbnail' => $faker->imageUrl(400,300),
        'name' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph(10)
    ];
});
