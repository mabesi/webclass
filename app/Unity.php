<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{

  public function course()
  {
    return $this->belongsTo('App\Course');
  }

  public function lessons()
  {
    return $this->hasMany('App\Lesson');
  }

  public function examination()
  {
    return $this->hasOne('App\Examination');
  }

}
