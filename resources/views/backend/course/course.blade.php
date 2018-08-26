@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      <a href="{{ url('course/'.$course->id.'/unity/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Unidade</a>
      <a href="{{ url('course/'.$course->id.'/courseware/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Arquivo</a>
      {!! getItemAdminIcons($course,'course','True') !!}
    </span>
    <h1><i class="fa fa-dot-circle-o"></i> {{ $course->title }}</h1>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <p class="text-justify">{{ $course->description }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        Categoria: <a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a>
      </div>
      <div class="col-sm-4">
        Instrutor: <a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a>
      </div>
      <div class="col-sm-5">
        Palavras-chave:{!! getKeywordsLinks($course->keywords) !!}
      </div>
    </div>


  </div>

</div>

<div class="card-footer">
  <div class="progress my-2">
    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
    </div>
  </div>
</div>

</div>

<div class="card mt-3">
  <div class="bg-light card-header">
    <h2>Conteúdo do Curso</h2>
  </div>
  <div class="card-body">

    <div class="row">

      <div class="col-sm-6">
        <h3 class="p-2 bg-light"><i class="fa fa-list"></i> Unidades</h3>
        <ul class="list-group">
          @foreach ($course->unities()->orderBy('sequence')->get() as $unity)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <span>
              <b>{{ $unity->sequence }}</b> -
              <a href="{{ url('unity/'.$unity->id) }}">{{ $unity->title }}</a>
            </span>
            <span>{!! getItemAdminIcons($unity,'unity','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="col-sm-6">
        <h3 class="p-2 bg-light"><i class="fa fa-folder-open"></i> Arquivos</h3>
        <ul class="list-group">
          @foreach ($course->coursewares as $courseware)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <span>
              <a href="{{ url('courseware/'.$courseware->name) }}">{{ $courseware->title }}</a>
            </span>
            <span>{!! getItemAdminIcons($courseware,'courseware','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection
