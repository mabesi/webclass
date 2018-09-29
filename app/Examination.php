<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
  public $rules = [
    'sequence' => 'required|integer|between:1,255',
  ];

  public $messages = [
    'sequence.required' => 'O campo Sequência é obrigatório.',
    'sequence.between' => 'O campo Sequência deve estar entre 1 e 255.',
  ];

  public function unity()
  {
    return $this->belongsTo('App\Unity');
  }

  public function questions()
  {
    return $this->hasMany('App\Question');
  }

  public function users()
  {
    return $this->belongsToMany('App\User')->withPivot('result','grade');
  }

  public function grade($userId)
  {
    $user = $this->users()->where('id',$userId)->first();
    if (!$user==Null){
      return $user->pivot->grade;
    } else {
      return Null;
    }
  }

}
