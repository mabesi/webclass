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
          'name' => 'Administrador',
          'email' => 'admin@gmail.com',
          'type' => 'A',
          'password' => bcrypt('webclass'),
          'remember_token' => str_random(10),
      ]);

      DB::table('users')->insert([
        'name' => 'Plinio Mabesi',
        'email' => 'pliniomabesi@gmail.com',
        'type' => 'U',
        'password' => bcrypt('webclass'),
        'remember_token' => str_random(10),
      ]);

      DB::table('users')->insert([
          'name' => 'Liza Barral',
          'email' => 'liza@gmail.com',
          'type' => 'U',
          'password' => bcrypt('webclass'),
          'remember_token' => str_random(10),
      ]);

      factory(App\User::class, 25)->create();
    }
}
