<?php

use Illuminate\Database\Seeder;
use App\Unity;

class UnitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Unity::truncate();
      factory(App\Unity::class, 60)->create();
    }
}
