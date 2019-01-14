<?php

use App\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
   
    $name = $faker->word;

    return [
        "name"=> $faker->word,
        "slug" => str_slug($name),
        "banner" => $faker->imageUrl
    ];
});
