<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courseware extends Model
{
  public $rules = [
    'title' => 'required|string|between:4,60',
    'course_id' => 'required|integer',
    'courseware' => 'required_without:_method|file|max:10000|mimes:pdf,doc,docx,odt,xls,xlsx,ods,ppt,pptx,odp',
  ];

  public $messages = [
    'title.required' => 'O campo Título é obrigatório.',
    'title.string' => 'O campo Título dever ser somente texto.',
    'title.between' => 'O campo Título deve ter entre 4 e 60 caracteres.',
    'courseware.required_without' => 'O campo arquivo é obrigatório.',
    'courseware.max' => 'O tamanho máximo do arquivo é 10 MB.',
    'courseware.mimes' => 'Os tipos de arquivo permitidos são: pdf, doc, docx, odt, xls, xlsx, ods, ppt, pptx e odp.',
  ];

  public function course()
  {
    return $this->belongsTo('App\Course');
  }

}
