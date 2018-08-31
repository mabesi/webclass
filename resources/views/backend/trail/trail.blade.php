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

  </div>

</div>

<div class="card">
  <div class="card-body">

    <h2 class="p-2 bg-light"><i class="fa fa-graduation-cap"></i> Cursos Integrantes da Trilha</h2>

    <form action="{{ url('/trail/'.$trail->id.'/course/include') }}" method="POST" >

      {{ csrf_field() }}

      <div class="row">

        <div class="col-sm-2">
          <div class="form-group">
            <label for="keywords">Ordem na Trilha</label>
            <input class="form-control" id="sequence" type="number" name="sequence"
            value="{{ old('sequence',$trail->courses()->count()+1) }}" min="1" step="1">
          </div>
        </div>

        <div class="col-sm-8">
          <div class="form-group">
            <label for="course_id">Curso</label>

            <select class="form-control" name="course_id">
              <option value=""></option>
              @foreach ($courses as $course)
              <option value="{{ $course->id }}" >
                {{ $course->title }}
              </option>
              @endforeach
            </select>

          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <button type="submit" class="btn btn-primary form-control mt-3">Incluir</button>
          </div>
        </div>

      </div>
    </form>

    <ul class="list-group">
      @foreach ($trail->courses()->orderBy('pivot_sequence')->get() as $course)
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
          <b>{{ $course->pivot->sequence }}</b> -
          <a href="{{ url('course/'.$course->id) }}">
            {{ $course->title }} {!! getStarIcon($course->ratings()->avg('rate'),'warning') !!}
          </a>
        </span>
        <span>
          <a class="btn btn-sm delete-button btn-outline-danger" title="Remover Curso da Trilha"
             href="{{ url('trail/'.$trail->id.'/course/'.$course->id.'/remove') }}"
             data-token="{{ csrf_token() }}" data-resource="False" data-previous="{{ URL::previous() }}">
            <i class="fa fa-minus-square"></i>
          </a>
      </span>
      </li>
      @endforeach
    </ul>

  </div>
</div>

@endsection
