<?php

$factory->define(App\Entities\NewsCategories::class, function (Faker\Generator $faker) {
    static $password;

    return [
		'parent_id' => -1,
		'title' => strtoupper($faker->word(2)),
    ];
});
