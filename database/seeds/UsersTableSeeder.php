<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();

      DB::table('users')->insert([
        'name' => "Laravel Core",
        'email' => "laracore@domain.com",
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
      ]);
    }
}
