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

}
