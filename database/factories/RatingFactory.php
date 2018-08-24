<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
  return [
      'comment' => $faker->sentence(6),
      'rate' => rand(1,5),
      'course_id' => rand(1,15),
      'user_id' => rand(2,27),
  ];
});
