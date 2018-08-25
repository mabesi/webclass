<?php

use Faker\Generator as Faker;

$factory->define(App\Trail::class, function (Faker $faker) {
    return [
      'title' => $faker->sentence(3),
      'description' => $faker->text(500),
    ];
});
