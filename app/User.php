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
      'email' => 'required|email',
      'password' => 'nullable|string|min:6',
    ];

    public $mymessages = [
      'name.required' => 'O campo Título é obrigatório.',
      'name.string' => 'O campo Título dever ser somente texto.',
      'name.between' => 'O campo Título deve ter no mínimo 5 caracteres.',
      'email.required' => 'O campo Conteúdo é obrigatório.',
      'email.string' => 'O campo Conteúdo deve ser somente texto.',
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

}
