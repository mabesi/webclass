@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      {!! getItemAdminIcons($lesson,'lesson','True') !!}
    </span>
    @else
      <span class="float-right">
        @if ($lesson->completed())
          <span class='badge badge-success font-sm'>Assistida</span>
        @elseif(isNotAdmin())
          <a href="{{ url('lesson/'.$lesson->id.'/watched') }}" title="Clique para marcar a aula como Assistida"
            class="btn btn-primary btn-sm confirm-link" data-message="Deseja marcar a aula como Assistida?">Finalizar Aula</a>
        @endif
      </span>
    @endif
    <h1><i class="fa fa-dot-circle-o"></i> {{ $lesson->title }}</h1>
  </div>

  <div class="card-body">

    <div class="m-1">
      {!! getYoutubeEmbedLink($lesson->link,'100%') !!}
    </div>

  </div>

</div>

</div>

@endsection
