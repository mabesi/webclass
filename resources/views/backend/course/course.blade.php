@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      <a href="{{ url('course/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Unidade</a>
      <a href="{{ url('course') }}" class="btn btn-primary btn-sm mr-1" >Incluir Arquivo</a>
      {!! getItemAdminIcons($course,'course','True') !!}
    </span>
    <h1><i class="fa fa-dot-circle-o"></i> {{ $course->title }}</h1>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-sm-5">
        <p class="text-justify">{{ $course->description }}</p>
        <div>
          Categoria: <a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a>
        </div>
        <div>
          Instrutor: <a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a>
        </div>
        <div>
          Palavras-chave:{!! getKeywordsLinks($course->keywords) !!}
        </div>
      </div>

      <div class="col-sm-7">

        <h2 class="p-2 bg-dark"><i class="fa fa-list"></i> Unidades</h2>

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
    </div>

  </div>

  <div class="card-footer">
    <div class="progress my-2">
      <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
      </div>
    </div>
  </div>

</div>

@endsection
