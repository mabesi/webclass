<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::statement("SET foreign_key_checks=0");

      $this->call(InstructorsTableSeeder::class);
      $this->call(CategoriesTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(CoursesTableSeeder::class);
      $this->call(UnitiesTableSeeder::class);
      $this->call(LessonsTableSeeder::class);
      $this->call(RatingsTableSeeder::class);
      $this->call(CoursewaresTableSeeder::class);

      //DB::statement("SET foreign_key_checks=1");
    }
}
