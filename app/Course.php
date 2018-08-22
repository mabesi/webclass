<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'title', 'category_id', 'keywords', 'instructor_id'
  ];

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function instructor()
  {
    return $this->belongsTo('App\Instructor');
  }

}
