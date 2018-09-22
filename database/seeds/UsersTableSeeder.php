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
      ]);

      DB::table('users')->insert([
          'name' => 'Liza Barral',
          'email' => 'liza@gmail.com',
          'type' => 'U',
          'password' => bcrypt('webclass'),
      ]);

      DB::table('users')->insert([
          'name' => 'José da Silva',
          'email' => 'jose@gmail.com',
          'type' => 'U',
          'password' => bcrypt('webclass'),
      ]);

      factory(App\User::class, 25)->create();
    }
}
