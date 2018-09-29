<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  protected $fillable = [
      'sequence','title','link'
  ];

  public $rules = [
    'title' => 'required|string|between:4,60',
    'sequence' => 'required|integer|between:1,255',
    'link' => [
      'required',
      'regex:/^.*(youtu\.be|youtube\.com).*$/'
      ],
  ];

  public $messages = [
    'title.required' => 'O campo Título é obrigatório.',
    'title.string' => 'O campo Título dever ser somente texto.',
    'title.between' => 'O campo Título deve ter entre 4 e 60 caracteres.',
    'sequence.required' => 'O campo Sequência é obrigatório.',
    'sequence.between' => 'O campo Sequência deve estar entre 1 e 255.',
    'link.required' => 'O campo Link é obrigatório.',
    'link.regex' => 'O campo Link deve conter um endereço de vídeo do Youtube válido.',
  ];

  public function delete()
  {
    $this->users()->detach();

    return parent::delete();
  }


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
