<?php

use Faker\Generator as Faker;

$factory->define(App\Unity::class, function (Faker $faker) {
  return [
      'title' => $faker->sentence(4),
      'sequence' => rand(1,20),
      'course_id' => rand(1,15),
  ];
});
