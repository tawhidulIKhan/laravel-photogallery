<?php

use App\ContactInfo;
use Faker\Generator as Faker;

$factory->define(ContactInfo::class, function (Faker $faker) {
    
    $title = $faker->sentence(3);

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->paragraph('50')    
    ];

});
