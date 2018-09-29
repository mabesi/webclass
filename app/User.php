<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
      'name' => 'required|string|between:4,60',
      'email' => 'required|email|unique:users',
      'password' => [
        'required_without:_method',
        'nullable',
        'min:8',
        'regex:/^([a-zA-Z]+\d+)|(\d+[a-zA-Z]+)$/'
        ],
    ];

    public $messages = [
      'name.required' => 'O campo Nome é obrigatório.',
      'name.string' => 'O campo Nome dever ser somente texto.',
      'name.between' => 'O campo Nome deve ter entre 4 e 60 caracteres.',
      'email.required' => 'O campo E-mail é obrigatório.',
      'email.email' => 'O campo E-mail deve conter um e-mail válido.',
      'email.unique' => 'Este e-mail já está sendo utilizado por outro usuário.',
      'password.required_without' => 'O campo Senha é obrigatório para novos usuários.',
      'password.min' => 'A senha deve conter pelo menos 8 caracteres.',
      'password.regex' => 'A senha deve conter letras e números.',
    ];

    public function ratings()
    {
      return $this->hasMany('App\Rating');
    }

    public function courses()
    {
      return $this->belongsToMany('App\Course');
    }

    public function ratedCourses()
    {
      return $this->belongsToMany('App\Course','ratings');
    }

    public function lessons()
    {
      return $this->belongsToMany('App\Lesson');
    }

    public function examinations()
    {
      return $this->belongsToMany('App\Examination')->withPivot('result','grade');
    }

}
