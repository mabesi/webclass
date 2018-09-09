@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      @if (isset($search))
      <a href="{{ url('course') }}" class="btn btn-warning mx-1" >Ver Todos</a>
      @endif
      @if (isAdmin())
      <a href="{{ url('course/create') }}" class="btn btn-primary mx-1" >Novo Curso</a>
      @endif
    </span>
    <h1><i class="fa fa-list"></i> Cursos</h1>
  </div>
  <div class="card-body">

    <form class="form-horizontal" action="{{ url($path) }}" method="get">

      <div class="form-group row  mb-2">

        <div class="input-group col-sm-3 mb-1">
          <input id="search" name="search" class="form-control" type="text"
            value="{{ isset($search)?$search:Null }}" >
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
          <th>Palavras Chave</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($courses as $course)
        <tr>
          <td class="col-sm-4"><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a><br>{!! getCourseStarIcon($course,'warning') !!}</td>
          <td class="col-sm-2"><a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a></td>
          <td class="col-sm-2"><a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a></td>
          <td class="col-sm-2">{!! getKeywordsLinks($course->keywords) !!}</td>
          <td class="col-sm-1">
            @if (isAdmin())
              {!! getItemAdminIcons($course,'course','False') !!}
            @else
              {!! getInscriptionButton($course) !!}
            @endif
          </td>
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
