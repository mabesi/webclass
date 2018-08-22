@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <a href="{{ url('instructor/create') }}" class="btn btn-primary float-right" >Novo Instrutor</a>
    <h1><i class="fa fa-graduation-cap"></i> INSTRUTORES</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <ul class="list-group">
          @foreach ($instructors as $instructor)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            {{ $instructor->name }}
            <span class="float-right">{!! getItemAdminIcons($instructor,'instructor','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-sm-12">
        {{ $instructors->links("pagination::bootstrap-4") }}
      </div>
    </div>

  </div>

</div>

@endsection
