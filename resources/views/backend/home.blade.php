@extends('backend.layouts.panel')

@push('all_css')

<!-- Backend Page Extra CSS -->
@stack('css')
@endpush

@section('content')

<div class="row">
  <div class="col-sm-12">
    <h2 class="text-muted">Pesquisar Cursos</h2>
  </div>
</div>

<form class="form-horizontal" action="{{ url('course') }}" method="get">

  <div class="form-group row mb-4">

    <div class="input-group col-sm-9 mb-1">
      <input id="search" name="search" class="form-control font-3xl" type="text"
        value="{{ isset($search)?$search:Null }}" >
    </div>

    <div class="col-sm-3 mb-1">
      <span class="input-group-append">
        <button type="submit" class="btn btn-primary form-control font-3xl">
          <i class="fa fa-search"></i> Pesquisar
        </button>
      </span>
    </div>

  </div>

</form>

<div class="row">

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-primary text-center">
        <i class="fa fa-tasks super-icon"></i>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('mycourses') }}" class="font-2xl" >Meus Cursos</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-danger text-center">
        <i class="fa fa-list super-icon"></i>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('course') }}" class="font-2xl">Todos os Cursos</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-warning text-center">
        <i class="fa fa-th-large super-icon"></i>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('category') }}" class="font-2xl" >Categorias</a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-dark text-center">
        <i class="fa fa-map super-icon"></i>
      </div>
      <div class="card-footer text-center">
        <a href="{{ url('trail') }}" class="font-2xl" >Trilhas de Formação</a>
      </div>
    </div>
  </div>

</div>

@push('all_scripts')

<!-- Backend Page Extra Scripts -->
@stack('scripts')
@endpush

@endsection
