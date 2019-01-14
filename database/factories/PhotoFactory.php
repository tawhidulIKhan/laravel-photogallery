<?php

use App\User;
use App\Album;
use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    
    $title = $faker->sentence;

    return [
        "title" => $title,
        "description" => $faker->paragraph(10),
        "image" => $faker->imageUrl,
        "slug"=>str_slug($title),
        "user_id" => User::all()->random(),
        "album_id" => Album::all()->random()  
    ];
});
