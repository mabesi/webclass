<?php

use Illuminate\Database\Seeder;
use App\Courseware;

class CoursewaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Courseware::truncate();
      factory(App\Courseware::class, 100)->create();
    }
}
