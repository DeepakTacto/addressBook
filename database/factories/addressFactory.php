<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement(['Home','Work', 'Other']),
        'userId' => rand(0, 10),
        'name' => $faker->text(20),
        'contactNumbar' => $faker->randomNumber(8, true),
        'addressLine1' => $faker->text(20),
        'addressLine2' => $faker->text(20),
        'addressLine3' => $faker->text(20),
        'pincode' => $faker->randomNumber(6),
        'street' => $faker->text(10),
        'state' => $faker->text(10),
        'city' => $faker->text(10),
        'isDefault' => rand(0, 1),
    ];
});
