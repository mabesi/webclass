<?php

use Faker\Generator as Faker;

$factory->define(App\Courseware::class, function (Faker $faker) {
  return [
      'title' => $faker->sentence(4),
      'name' => $faker->word.$faker->randomElement([".doc",".pdf",".xls",".ods",".ppt"]),
      'course_id' => rand(1,15),
  ];
});
