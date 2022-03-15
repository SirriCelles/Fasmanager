<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    $dt = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now');
    $date = $dt->format("Y-m-d");
    return [
        //
        'description' => $faker->name,
        'brand'=> $faker->name,
        'manufacturer' => $faker->name,
        'model' => $faker->name,
        'equipmentType_id' => mt_rand(1,4),
        'econdition' => $faker->name,
        'purchased_date' => $date,
        'purchased_value' => mt_rand(100,1000),
        'serial_number' => mt_rand(256, 500),
        'current_value' => mt_rand(100,1000),
        'scrap_value' => mt_rand(100,1000),
        'use_frequency' => 'Daily',
        'current_status'=> 'in Storage',
        'vendor' => $faker->name,
        'notes' => $faker->sentence,
        'custodian' => $faker->name,
        'date_of_start_use' => $date,
        'expiration_date' => $date,
        'depreciation_level' => 'Working',
        'image_path' => $faker->url,

    ];
});
