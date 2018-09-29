<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    protected $fillable = [
        'title','description'
    ];

    public $rules = [
      'title' => 'required|string|between:4,60',
      'description' => 'required|string|min:21',
    ];

    public $messages = [
      'title.required' => 'O campo Título é obrigatório.',
      'title.string' => 'O campo Título dever ser somente texto.',
      'title.between' => 'O campo Título deve ter entre 4 e 60 caracteres.',
      'description.required' => 'O campo Descrição é obrigatório.',
      'description.string' => 'O campo Descrição dever ser somente texto.',
      'description.min' => 'O campo Descrição deve ter pelo menos 10 caracteres.',
    ];

    public function courses()
    {
      return $this->belongsToMany('App\Course')->withPivot('sequence');
    }

}
