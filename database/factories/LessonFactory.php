<?php

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
  return [
      'title' => $faker->sentence(4),
      'link' => "https://www.youtube.com/embed/".$faker->randomElement([
        '8R_cfQavJg0','recB5MA-h9U','G7osIEUSmdo','MUIOm93FaPM','8hc8cJFlcmA',
        'Ocld4ihjQQA','LmnvNMm17Bk','-TCafMQIJIY','KCKrFLjSGLA','zf-43HSd7iw',
        '0u4GPmPUQ8U','PLhVI4hncDE','Ik5FnXoLkVk','iZgW3GGBXYQ','9TD068wERJc',
        'P4j24Gma_PU','s0W1SFm3e7s','OjzOjdDgZH4','J-_F-qUATvY','d9fNQUxaoKI'
      ]),
      'sequence' => rand(1,20),
      'unity_id' => rand(1,60),
  ];
});
