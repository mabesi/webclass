<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
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
    'name' => 'required|string|between:4,60',
  ];

  public $messages = [
    'name.required' => 'O campo Nome é obrigatório.',
    'name.string' => 'O campo Nome dever ser somente texto.',
    'name.between' => 'O campo Nome deve ter entre 4 e 60 caracteres.',
  ];    

  public function courses()
  {
    return $this->hasMany('App\Course');
  }

  public static function getInstructorsId($search)
  {
    $instructors = Instructor::Where('name','like',"%$search%")
                        ->get();
    $instructorsId = Array();

    foreach ($instructors as $instructor){
      $instructorsId[] = $instructor->id;
    }

    return $instructorsId;
  }

}
