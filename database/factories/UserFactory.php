<?php

$factory->define(App\Entities\Sentinel\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'address' => $faker->address,
    ];
});