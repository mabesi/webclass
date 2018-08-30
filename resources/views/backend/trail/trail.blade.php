@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      {!! getItemAdminIcons($trail,'trail','True') !!}
    </span>
    @endif
    <h1><i class="fa fa-dot-circle-o"></i> {{ $trail->title }}</h1>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <p class="text-justify">{!! $trail->description !!}</p>
      </div>
    </div>

    <h2 class="p-2 bg-light"><i class="fa fa-graduation-cap"></i> Cursos</h2>
    <ul class="list-group">
      @foreach ($trail->courses()->orderBy('pivot_sequence')->get() as $course)
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
          <b>{{ $course->pivot->sequence }}</b> -
          <a href="{{ url('course/'.$course->id) }}">
            {{ $course->title }}
          </a>
        </span>
        <span>X</span>
      </li>
      @endforeach
    </ul>

  </div>

</div>


@endsection
