@extends('backend.layouts.panel')

@section('content')

<h1 class="page-title">CURSOS</h1>

<div class="module message">
  <div class="module-head">
    <h3>Lista de Cursos</h3>
  </div>
  <div class="module-option clearfix">
    <form>
      <div class="input-append pull-left">
        <input class="span3" placeholder="Pesquisar pelo nome..." type="text" name="search"
        value="{{ isset($user->password)?$user->password:Null }}">
        <button type="submit" class="btn">
          <i class="icon-search"></i>
        </button>
      </div>
    </form>
  </div>

  <div class="module-body">

    <table class="table table-striped">
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
          <td>
            {!! getItemAdminIcons($course,'course','False') !!}
        </tr>
@endforeach
      </tbody>
    </table>

  </div>
  <div class="module-foot pagination">
      {{ $courses->links() }}
  </div>
</div>

@endsection
