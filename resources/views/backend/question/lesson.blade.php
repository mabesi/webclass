@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      {!! getItemAdminIcons($lesson,'lesson','True') !!}
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
