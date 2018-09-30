<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name'
  ];

  public $rules = [
    'name' => 'required|string|between:4,60|unique:categories',
  ];

  public $messages = [
    'name.required' => 'O campo Nome é obrigatório.',
    'name.string' => 'O campo Nome dever ser somente texto.',
    'name.between' => 'O campo Nome deve ter entre 4 e 60 caracteres.',
    'name.unique' => 'Este nome de Categoria já está em uso.',
  ];

  public function courses()
  {
    return $this->hasMany('App\Course');
  }

  public static function getCategoriesId($search)
  {
    $categories = Category::Where('name','like',"%$search%")
                        ->get();
    $categoriesId = Array();

    foreach ($categories as $category){
      $categoriesId[] = $category->id;
    }

    return $categoriesId;
  }

}
