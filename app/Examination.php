<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{

  public function unity()
  {
    return $this->belongsTo('App\Unity');
  }

  public function questions()
  {
    return $this->hasMany('App\Question');
  }

}
