<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
  return [
    'sequence' => rand(1,15),
    'statement' => $faker->text(500),
    'answer1' => $faker->text(100),
    'answer2' => $faker->text(100),
    'answer3' => $faker->text(100),
    'answer4' => $faker->text(100),
    'right_answer' => rand(1,4),
    'examination_id' => rand(1,60),
  ];
});
