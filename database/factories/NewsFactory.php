<?php

$factory->define(App\Entities\News::class, function (Faker\Generator $faker) {
	$title = $faker->sentence(6);
	$paragraph = $faker->paragraph(rand(10, 20));

    return [
    	'news_cate_id' => 1,
		'user_id' => 1,
		'title' => $title,
		'title_slug' => str_slug($title, '-'),
		'short_desc' => $faker->paragraph(5),
		'content' => $faker->paragraph(rand(10, 20))
    ];
});
