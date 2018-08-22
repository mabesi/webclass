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
