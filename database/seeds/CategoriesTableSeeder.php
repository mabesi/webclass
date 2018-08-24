<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::truncate();

      DB::table('categories')->insert([
          'name' => 'Administração',
      ]);
      DB::table('categories')->insert([
          'name' => 'Áudio e Vídeo',
      ]);
      DB::table('categories')->insert([
          'name' => 'Contabilidade',
      ]);
      DB::table('categories')->insert([
          'name' => 'Design Gráfico',
      ]);
      DB::table('categories')->insert([
          'name' => 'Direito',
      ]);
      DB::table('categories')->insert([
          'name' => 'Gestão',
      ]);
      DB::table('categories')->insert([
          'name' => 'Idiomas',
      ]);
      DB::table('categories')->insert([
          'name' => 'Informática',
      ]);
      DB::table('categories')->insert([
          'name' => 'Marketing',
      ]);
      DB::table('categories')->insert([
          'name' => 'Motivação',
      ]);
      DB::table('categories')->insert([
          'name' => 'Negócios',
      ]);
      DB::table('categories')->insert([
          'name' => 'Psicologia',
      ]);
      DB::table('categories')->insert([
          'name' => 'Relações Humanas',
      ]);
      DB::table('categories')->insert([
          'name' => 'Segurança',
      ]);
      DB::table('categories')->insert([
          'name' => 'Turismo e Hotelaria',
      ]);

      //factory(App\Category::class, 10)->create();
    }
}
