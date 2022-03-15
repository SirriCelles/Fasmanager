<?php

use Faker\Generator as Faker;
use App\Privilege;

$factory->define(Privilege::class, function (Faker $faker) {
    return [
        'pslug' => 'manage-rooms'.$faker->name,
             'name' => $faker->name,
             'description' => $faker->sentence,
             'path' => $faker->url,
    ];
});
