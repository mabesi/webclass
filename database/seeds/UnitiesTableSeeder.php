<?php

use Illuminate\Database\Seeder;
use App\Unity;
use App\Examination;
use App\Question;

class UnitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('examination_user')->truncate();
      Unity::truncate();
      Examination::truncate();
      Question::truncate();
      factory(App\Unity::class, 60)
                  ->create()
                  ->each(function ($unity){
                    $unity->examination()->save(factory(App\Examination::class)->make());
                    $unity->examination()->each(function ($examination){
                      $examination->questions()->saveMany(factory(App\Question::class,5)->make());
                    });
                  });
    }
}
