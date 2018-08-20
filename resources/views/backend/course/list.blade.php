@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> Cursos

  </div>
  <div class="card-body">

    <form class="form-horizontal" action="{{ url($path) }}" method="get">

      <div class="form-group row  mb-3">
        <div class="input-group col-3">
          <input id="title" name="title" class="form-control" placeholder="Nome do curso" type="text"
            value="{{ isset($course->title)?$course->title:Null }}" >
        </div>
        <div class="input-group col-3">
          <input id="category" name="category" class="form-control" placeholder="Categoria" type="text"
            value="{{ isset($course->category)?$course->category:Null }}" >
        </div>
        <div class="input-group col-3">
          <input id="instructor" name="instructor" class="form-control" placeholder="Instrutor" type="text"
            value="{{ isset($course->instructor)?$course->instructor:Null }}" >
        </div>
        <div class="col-2">
          <span class="input-group-append">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-search"></i> Pesquisar
            </button>
          </span>
        </div>
      </div>
    </form>

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Título</th>
          <th>Categoria</th>
          <th>Instrutor</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $course)
        <tr>
          <td><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a></td>
          <td>{{ $course->category }}</td>
          <td>{{ $course->instructor }}</td>
          <td>{!! getItemAdminIcons($course,'course','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $courses->links("pagination::bootstrap-4") }}

  </div>

</div>

@endsection
