<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

  public function unity()
  {
    return $this->belongsTo('App\Unity');
  }

  public function users()
  {
    return $this->belongsToMany('App\User');
  }

  public function completed($userId=Null)
  {
    if ($userId==Null){
      $userId = getUserId();
    }
    $user = $this->users()->where('id',$userId)->first();
    return ($user != Null);
  }

}
