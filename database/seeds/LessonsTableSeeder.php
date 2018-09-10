<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('lesson_user')->truncate();
      Lesson::truncate();
      factory(App\Lesson::class, 240)->create();
    }
}
