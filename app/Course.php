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

  public function unities()
  {
    return $this->hasMany('App\Unity');
  }

  public function coursewares()
  {
    return $this->hasMany('App\Courseware');
  }

  public function ratings()
  {
    return $this->hasMany('App\Rating');
  }

  public function raters()
  {
    return $this->belongsToMany('App\User','ratings');
  }

  public function trails()
  {
    return $this->belongsToMany('App\Trail');
  }

  public function users()
  {
    return $this->belongsToMany('App\User');
  }

  public function registered($userId)
  {
    $user = $this->users()->where('id',$userId)->first();
    return ($user != Null);
  }

  public function progress($userId=Null,$onlyVideos=False)
  {
    if ($userId==Null){
      $userId = getUserId();
    }

    $totalUnities = 0;
    $totalProgress = 0;

    $unities = $this->unities;

    foreach($unities as $unity){
      $totalUnities++;
      $totalProgress = $totalProgress + $unity->progress($userId,$onlyVideos);
    }

    $progress = (int) (($totalProgress/($totalUnities*100))*100);

    return $progress;
  }

  public function average($userId=Null)
  {
    if ($userId==Null){
      $userId = getUserId();
    }

    $totalExaminations = 0;
    $totalGrade = 0;

    $unities = $this->unities;

    foreach($unities as $unity){
      if ($unity->examination!=Null){
        $totalExaminations++;
        if ($unity->examination->grade($userId)!=Null){
          $totalGrade = $totalGrade + $unity->examination->grade($userId);
        } else {
          return 0;
        }
      }
    }

    //dd($totalGrade);

    $average = round($totalGrade / $totalExaminations,2);

    return $average;
  }

}
