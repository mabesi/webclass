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

  public $rules = [
    'title' => 'required|string|between:4,60',
    'category_id' => 'required|integer',
    'status' => 'required_with:_method|in:N,E,C',
    'instructor_id' => 'required|integer',
    'keywords' => 'required|string|min:3',
    'description' => 'required|string|min:21',
  ];

  public $messages = [
    'title.required' => 'O campo Título é obrigatório.',
    'title.string' => 'O campo Título dever ser somente texto.',
    'title.between' => 'O campo Título deve ter entre 4 e 60 caracteres.',
    'category_id.required' => 'O campo Categoria é obrigatório.',
    'status.required_with' => 'O campo Status é obrigatório.',
    'status.in' => 'O campo Status deve ser uma das opções: Novo / Em Elaboração / Completo.',
    'keywords.required' => 'O campo Palavras-chave é obrigatório.',
    'keywords.string' => 'O campo Palavras-chave deve ser texto.',
    'keywords.min' => 'O campo Palavras-chave deve conter pelo menos 3 caracteres.',
    'instructor_id.required' => 'O campo Instrutor é obrigatório.',
    'description.required' => 'O campo Descrição é obrigatório.',
    'description.string' => 'O campo Descrição dever ser somente texto.',
    'description.min' => 'O campo Descrição deve ter pelo menos 10 caracteres.',
  ];

  public function delete()
  {
    $this->trails()->detach();
    $this->ratings()->delete();
    foreach ($this->unities as $unity){
      $unity->delete();
    };
    $this->coursewares()->delete();

    return parent::delete();
  }

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

    if ($totalUnities==0){
        $progress = 0;
    } else {
      $progress = (int) (($totalProgress/($totalUnities*100))*100);
    }

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

    if ($totalExaminations==0){
      $average = 0;
    } else {
      $average = round($totalGrade / $totalExaminations,2);
    }

    return $average;
  }

}
