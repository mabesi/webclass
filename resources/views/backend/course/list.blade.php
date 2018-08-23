@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <a href="{{ url('course/create') }}" class="btn btn-primary float-right mx-1" >Novo Curso</a>
    <a href="{{ url('course') }}" class="btn btn-secondary float-right mx-1" >Ver Todos</a>
    <h1><i class="fa fa-list"></i> CURSOS</h1>
  </div>
  <div class="card-body">

    <form class="form-horizontal" action="{{ url($path) }}" method="get">

      <div class="form-group row  mb-2">

        <div class="input-group col-sm-3 mb-1">
          <input id="title" name="title" class="form-control" placeholder="Título" type="text"
            value="{{ isset($search['title'])?$search['title']:Null }}" >
        </div>

        <div class="input-group col-sm-3 mb-1">
          <input id="title" name="category" class="form-control" placeholder="Categoria" type="text"
            value="{{ isset($search['category'])?$search['category']:Null }}" >
        </div>

        <div class="input-group col-sm-3 mb-1">
          <input id="instructor" name="instructor" class="form-control" placeholder="Instrutor" type="text"
            value="{{ isset($search['instructor'])?$search['instructor']:Null }}" >
        </div>

        <div class="col-sm-3 mb-1">
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
          <th>Título
            <a href="{{ $path }}?sort=title&dir={{ ($sort=='title'?$newDir:'desc') }}{{$queryLink==Null?'':'&'.$queryLink}}">
              <i class="fa fa-sort-alpha-{{ ($sort=='title'?$newDir:'desc') }}"></i>
            </a>
          </th>
          <th>Categoria</th>
          <th>Instrutor</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $course)
        <tr>
          <td class="col-sm-5"><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a></td>
          <td class="col-sm-3"><a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a></td>
          <td class="col-sm-3"><a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a></td>
          <td class="col-sm-1">{!! getItemAdminIcons($course,'course','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $courses->appends($search)
                ->appends(['sort' => $sort,'dir' => $dir])
                ->links("pagination::bootstrap-4") }}

  </div>

</div>

@endsection
