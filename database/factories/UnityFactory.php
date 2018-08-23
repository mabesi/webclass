<?php

use Faker\Generator as Faker;

$factory->define(App\Unity::class, function (Faker $faker) {
  return [
      'title' => $faker->sentence(4),
      'sequence' => rand(1,255),
      'course_id' => rand(1,60),
  ];
});
