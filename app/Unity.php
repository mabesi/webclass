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

  public function progress($userId=Null,$onlyVideos=False)
  {
    if ($userId==Null){
      $userId = getUserId();
    }

    $totalItems = 0;
    $completedItems = 0;

    $lessons = $this->lessons;

    foreach($lessons as $lesson){
      $totalItems++;
      if ($lesson->completed($userId)){
        $completedItems++;
      }
    }

    if(!$onlyVideos){
      if (!$this->examination==Null){
        $totalItems++;
        if ($this->examination->grade($userId)!=Null){
          $completedItems++;
        }
      }
    }

    if ($totalItems==0){
      $progress = 0;  
    } else {
      $progress = (int) (($completedItems/$totalItems)*100);
    }

    return $progress;
  }

}
