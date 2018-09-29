<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title','description'
    ];

    public $rules = [
      'sequence' => 'required|integer|between:1,255',
      'statement' => 'required|string|min:21',
      'answer1' => 'required|string|min:12',
      'answer2' => 'required|string|min:12',
      'answer3' => 'required|string|min:12',
      'answer4' => 'required|string|min:12',
      'right_answer' => 'required|integer|between:1,4',
    ];

    public $messages = [
      'sequence.required' => 'O campo Número da Questão é obrigatório.',
      'sequence.between' => 'O campo Número da Questão deve estar entre 1 e 255.',
      'statement.required' => 'O campo Enunciado é obrigatório.',
      'statement.string' => 'O campo Enunciado dever ser somente texto.',
      'statement.min' => 'O campo Enunciado deve ter pelo menos 10 caracteres.',
      'answer1.required' => 'O campo Resposta 1 é obrigatório.',
      'answer1.string' => 'O campo Resposta 1 dever ser somente texto.',
      'answer1.min' => 'O campo Resposta 1 deve ter pelo menos 1 caráter.',
      'answer2.required' => 'O campo Resposta 2 é obrigatório.',
      'answer2.string' => 'O campo Resposta 2 dever ser somente texto.',
      'answer2.min' => 'O campo Resposta 2 deve ter pelo menos 1 caráter.',
      'answer3.required' => 'O campo Resposta 3 é obrigatório.',
      'answer3.string' => 'O campo Resposta 3 dever ser somente texto.',
      'answer3.min' => 'O campo Resposta 3 deve ter pelo menos 1 caráter.',
      'answer4.required' => 'O campo Resposta 4 é obrigatório.',
      'answer4.string' => 'O campo Resposta 4 dever ser somente texto.',
      'answer4.min' => 'O campo Resposta 4 deve ter pelo menos 1 caráter.',
      'right_answer.required' => 'O campo Resposta Correta é obrigatório.',
      'right_answer.between' => 'O campo Resposta Correta deve estar entre 1 e 4.',
    ];

    public function examination()
    {
      return $this->belongsTo('App\Examination');
    }

}
