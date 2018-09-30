<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unity extends Model
{
  public $rules = [
    'title' => 'required|string|between:4,60',
    'sequence' => 'required|integer|between:1,255',
  ];

  public $messages = [
    'title.required' => 'O campo Título é obrigatório.',
    'title.string' => 'O campo Título dever ser somente texto.',
    'title.between' => 'O campo Título deve ter entre 4 e 60 caracteres.',
    'sequence.required' => 'O campo Número da Unidade é obrigatório.',
    'sequence.between' => 'O campo Número da Unidade deve estar entre 1 e 255.',
  ];

  public function delete()
  {
    foreach ($this->lessons as $lesson){
      $lesson->delete();
    };
    $this->examination()->delete();

    return parent::delete();
  }

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
