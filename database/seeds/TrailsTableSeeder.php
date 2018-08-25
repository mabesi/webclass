<?php

use Illuminate\Database\Seeder;
use App\Trail;

class TrailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('course_trail')->truncate();
      Trail::truncate();

      factory(App\Trail::class, 15)->create()
              ->each(function ($trail) {
                $trail->courses()->attach([
                  rand(1,5) => ['sequence' => 1],
                  rand(6,10) => ['sequence' => 2],
                  rand(11,15) => ['sequence' => 3]
                ]);
              });

    }
}
