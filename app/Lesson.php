<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

  public function unity()
  {
    return $this->belongsTo('App\Unity');
  }
  
}
