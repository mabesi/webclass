<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {

    $title = $faker->sentence(3);
    $categories = getCategories();

    return [
        'title' => $title,
        'category' => $faker->randomElement($categories),
        'keywords' => $faker->word.",".$faker->word,
        'instructor' => $faker->name,
    ];
});
