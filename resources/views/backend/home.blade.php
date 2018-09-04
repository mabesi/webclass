@extends('backend.layouts.panel')

@push('all_css')

<!-- Backend Page Extra CSS -->
@stack('css')
@endpush

@section('content')

<div class="row">

  <div class="col-sm-6">

    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-muted">Pesquisar Cursos</h2>
      </div>
    </div>

    <form class="form-horizontal" action="{{ url('course') }}" method="get">

      <div class="form-group row  mb-2">

        <div class="input-group col-sm-8 mb-1">
          <input id="search" name="search" class="form-control" type="text"
            value="{{ isset($search)?$search:Null }}" >
        </div>

        <div class="col-sm-4 mb-1">
          <span class="input-group-append">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-search"></i> Pesquisar
            </button>
          </span>
        </div>

      </div>

    </form>

  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body p-0 d-flex align-items-center">
        <a href="{{ url('course') }}" >
          <i class="fa fa-list bg-danger p-5 font-5xl mr-3"></i>
        </a>
        <div>
          <div class="text-muted font-5xl font-weight-bold">{{ $totalCourses }}</div>
          <div class="text-uppercase font-weight-bold font-xl" >
            <a href="{{ url('course') }}" >Cursos</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body p-0 d-flex align-items-center">
        <a href="{{ url('category') }}" >
          <i class="fa fa-th-large bg-warning p-5 font-5xl mr-3"></i>
        </a>
        <div>
          <div class="text-muted font-5xl font-weight-bold">{{ $totalCategories }}</div>
          <div class="text-uppercase font-weight-bold font-xl" >
            <a href="{{ url('category') }}" >Categorias</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body p-0 d-flex align-items-center">
        <a href="{{ url('trail') }}" >
          <i class="fa fa-map bg-dark p-5 font-5xl mr-3"></i>
        </a>
        <div>
          <div class="text-muted font-5xl font-weight-bold">{{ $totalTrails }}</div>
          <div class="text-uppercase font-weight-bold font-xl" >
            <a href="{{ url('trail') }}" >Trilhas de Formação</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-sm-4">
    <a href="#" class="btn btn-lg btn-primary btn-block">Meus Cursos</a>
  </div>
  <div class="col-sm-4">
    <a href="#" class="btn btn-lg btn-warning btn-block">Meus Certificados</a>
  </div>
  <div class="col-sm-4">
    <a href="#" class="btn btn-lg btn-success btn-block">Meus Arquivos</a>
  </div>
</div>


@push('all_scripts')

<!-- Backend Page Extra Scripts -->
@stack('scripts')
@endpush

@endsection
