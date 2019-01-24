<?php

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    
    $title = $faker->sentence(3);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph(4),
        'price' => $faker->randomDigit(30,200),
        'thumbnail' => $faker->imageUrl
    ];
});
