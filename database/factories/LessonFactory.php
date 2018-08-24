<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
  return [
      'title' => $faker->sentence(4),
      'link' => "https://www.youtube.com/embed/FWQN8DD11oY",
      'sequence' => rand(1,20),
      'unity_id' => rand(1,60),
  ];
});
