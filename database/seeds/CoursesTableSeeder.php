<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Course::truncate();
      factory(App\Course::class, 15)->create();

      Course::find(1)->users()->attach([2,3,6,9]);
      Course::find(2)->users()->attach([3,5,7]);
      
    }
}
