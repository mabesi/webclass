<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  protected $fillable = [
      'sequence','title','link'
  ];

  public $rules = [
    'comment' => 'required|string|between:10,255',
    'rate' => 'required|integer|between:1,5',
    'course_id' => 'required|integer',
  ];

  public $messages = [
    'comment.required' => 'O campo Comentário é obrigatório.',
    'comment.string' => 'O campo Comentário dever ser somente texto.',
    'comment.between' => 'O campo Comentário deve ter entre 10 e 255 caracteres.',
    'rate.required' => 'O campo Classificação é obrigatório.',
    'rate.between' => 'O campo Classificação deve estar entre 1 e 5.',
  ];

  public function course()
  {
    return $this->belongsTo('App\Course');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
