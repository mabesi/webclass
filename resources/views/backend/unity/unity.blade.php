@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      <a href="{{ url('unity/'.$unity->id.'/lesson/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Videoaula</a>
      @if ($unity->examination==Null)
      <a href="{{ url('unity/'.$unity->id.'/examination/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Avaliação</a>
      @endif
      {!! getItemAdminIcons($unity,'unity','True') !!}
    </span>
    @endif
    <h1><i class="fa fa-dot-circle-o"></i> {{ $unity->title }}</h1>
  </div>

  <div class="card-body">

    <h2 class="p-2 bg-light"><i class="fa fa-youtube-play"></i> Videoaulas</h2>
    <ul class="list-group">
      @foreach ($unity->lessons()->orderBy('sequence')->get() as $lesson)
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
          <b>{{ $lesson->sequence }}</b> -
          <a data-toggle="modal" href="#" data-target="#largeModal" data-target-id="{{ url('lesson/'.$lesson->id.'/modal') }}">
            {{ $lesson->title }}
          </a>
        </span>
        <span>
          @if ($lesson->completed())
            <span class='badge badge-success font-sm'>Assistida</span>
          @endif
          {!! getItemAdminIcons($lesson,'lesson',False) !!}
        </span>
      </li>
      @endforeach
    </ul>

    <h2 class="p-2 bg-light mt-3"><i class="fa fa-clipboard"></i> Avaliação</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        @if (isset($unity->examination->id))
        <span>
          <b><a href="{{ url('examination/'.$unity->examination->id) }}" >
            Avaliação {{ $unity->examination->sequence }}</a></b>
        </span>
        <span>{!! getItemAdminIcons($unity->examination,'examination','False') !!}</span>
        @else
        <span>Esta unidade ainda não possui avaliação.</span>
        @endif
      </li>
    </ul>

  </div>

</div>

</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dark modal-lg" role="document">
    <div class="modal-content"></div>
  </div>
</div>

@endsection
