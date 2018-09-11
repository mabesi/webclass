@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <a href="{{ url('trail/create') }}" class="btn btn-primary float-right" >Nova Trilha</a>
    @endif
    <h1><i class="fa fa-map"></i> Trilhas de Formação</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <ul class="list-group">
          @foreach ($trails as $trail)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center mb-2">
            <span>
              <a href="{{ url('trail/'.$trail->id) }}" class="text-uppercase">{{ $trail->title }}</a><br>
              <span class="text-muted">{{ strlen($trail->description)>300?substr($trail->description,0,300).'...':$trail->description }}</span><br>
              <span class="font-weight-bold">{{ $trail->courses()->count() }} Cursos</span>
            </span>
            <span class="float-right">{!! getItemAdminIcons($trail,'trail','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-sm-12">
        {{ $trails->links("pagination::bootstrap-4") }}
      </div>
    </div>

  </div>

</div>

@endsection
