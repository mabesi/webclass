@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      <a href="{{ url('course/create') }}" class="btn btn-primary mx-1" >Incluir Unidade</a>
      <a href="{{ url('course') }}" class="btn btn-primary mx-1" >Incluir Arquivo</a>
      {!! getItemAdminIcons($course,'course','True') !!}
    </span>
    <h1><i class="fa fa-dot-circle-o"></i> {{ $course->title }}</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-3">
        Categoria: <a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a>
      </div>
      <div class="col-sm-3">
        Instrutor: <a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a>
      </div>
      <div class="col-sm-6">
        Palavras-chave:{!! getKeywordsLinks($course->keywords) !!}
      </div>
    </div>

  </div>

  <div class="card-footer">
    <div class="row">
      <div class="col-sm-4">
        Teste
      </div>
      <div class="col-sm-8">

      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h2>
      <i class="fa fa-align-justify"></i> Unidades
    </h2>
  </div>
  <div class="card-body">

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Ordem</th>
          <th>Título</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($course->unities()->orderBy('sequence')->get() as $unity)
        <tr>
          <td class="col-sm-1 font-weight-bold">{{ $unity->sequence }}</a></td>
          <td class="col-sm-6"><a href="{{ url('unity/'.$unity->id) }}">{{ $unity->title }}</a></td>
          <td class="col-sm-5">
            <a href="{{ url('course/create') }}" class="btn btn-primary btn-sm mx-1" >Incluir Videoaula</a>
            <a href="{{ url('course') }}" class="btn btn-primary btn-sm mx-1" >Incluir Avaliação</a>
            <span class="float-right">{!! getItemAdminIcons($unity,'unity','False') !!}</span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

<br><br>
<iframe width="100%" height="400" src="https://www.youtube.com/embed/FWQN8DD11oY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
@endsection
