<?php

use Illuminate\Database\Seeder;
use App\Instructor;

class InstructorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::truncate();
        factory(App\Instructor::class, 35)->create();
    }
}
