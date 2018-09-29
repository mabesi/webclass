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
      DB::table('course_user')->truncate();
      Course::truncate();
      factory(App\Course::class, 15)->create();

      Course::find(1)->users()->attach([2,3,6,9]);
      Course::find(2)->users()->attach([2,4,5,7]);
      Course::find(3)->users()->attach([2,5,7]);
      Course::find(6)->users()->attach([2,5,7]);
      Course::find(8)->users()->attach([3,5,7]);
      Course::find(10)->users()->attach([2,5,7]);
      Course::find(12)->users()->attach([2,3,5,7]);

    }
}
