@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      <a href="{{ url('course/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Videoaula</a>
      <a href="{{ url('course') }}" class="btn btn-primary btn-sm mr-1" >Incluir Avaliação</a>
      {!! getItemAdminIcons($unity,'unity','True') !!}
    </span>
    <h1><i class="fa fa-dot-circle-o"></i> {{ $unity->title }}</h1>
  </div>

  <div class="card-body">
<h2 class="p-2 bg-dark"><i class="fa fa-youtube-play"></i> Videoaulas</h2>

        <ul class="list-group">

          @foreach ($unity->lessons()->orderBy('sequence')->get() as $lesson)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <span>
              <b>{{ $lesson->sequence }}</b> -
              <a data-toggle="modal" href="#" data-target="#largeModal" data-target-id="{{ url('lesson/'.$lesson->id) }}">
                {{ $lesson->title }}
              </a>
            </span>
            <span>{!! getItemAdminIcons($lesson,'lesson','False') !!}</span>
          </li>
          @endforeach

        </ul>

    </div>

  </div>

</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"></div>
  </div>
</div>

@endsection
