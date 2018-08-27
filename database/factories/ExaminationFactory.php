<?php

use Faker\Generator as Faker;

$factory->define(App\Examination::class, function (Faker $faker) {
    return [
      'sequence' => rand(1,10),
      'unity_id' => rand(1,60),
    ];
});
