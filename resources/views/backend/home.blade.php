@extends('backend.layouts.panel')

@push('all_css')

<!-- Backend Page Extra CSS -->
@stack('css')
@endpush

@section('content')

<div class="row">


  <div class="col-sm-6">
    <div class="card">
      <div class="card-body p-0 d-flex align-items-center">
        <a href="{{ url('user') }}" >
          <i class="fa fa-group bg-success p-5 font-5xl mr-3"></i>
        </a>
        <div>
          <div class="text-muted font-5xl font-weight-bold">{{ $totalPupil }}</div>
          <div class="text-uppercase font-weight-bold font-xl">
            <a href="{{ url('user') }}" >Alunos</a>
          </div>
        </div>
      </div>
    </div>
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
        <a href="{{ url('instructor') }}" >
          <i class="fa fa-graduation-cap bg-info p-5 font-5xl mr-3"></i>
        </a>
        <div>
          <div class="text-muted font-5xl font-weight-bold">{{ $totalInstructors }}</div>
          <div class="text-uppercase font-weight-bold font-xl" >
            <a href="{{ url('instructor') }}" >Instrutores</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@push('all_scripts')

<!-- Backend Page Extra Scripts -->
@stack('scripts')
@endpush

@endsection
