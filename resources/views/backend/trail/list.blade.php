@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <a href="{{ url('trail/create') }}" class="btn btn-primary float-right" >Nova Trilha</a>
    <h1><i class="fa fa-map"></i> Trilhas de Formação</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <ul class="list-group">
          @foreach ($trails as $trail)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <a href="{{ url('trail/'.$trail->id) }}">{{ $trail->title }}</a>
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
