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


        <ul class="list-group">

          @foreach ($unity->lessons()->orderBy('sequence')->get() as $lesson)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <span>
              <b>{{ $lesson->sequence }}</b> -
              <a href="{{ url('lesson/'.$lesson->id) }}">{{ $lesson->title }}</a>
            </span>
            <span>{!! getItemAdminIcons($lesson,'lesson','False') !!}</span>
          </li>
          @endforeach

        </ul>

    </div>

  </div>

  <div class="card-footer">
    <div class="progress my-2">
      <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
      </div>
    </div>
  </div>

</div>

<a data-toggle="modal" href="{{ url('lesson-modal') }}" data-target="#largeModal">
Launch large modal
</a>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/FWQN8DD11oY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>

  </div>

</div>

@endsection
