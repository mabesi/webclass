<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(3),
        'category_id' => rand(1,20),
        'keywords' => $faker->word.",".$faker->word.",".$faker->word,
        'instructor_id' => rand(1,20),
    ];
});
