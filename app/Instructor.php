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
