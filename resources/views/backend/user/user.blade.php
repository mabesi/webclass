@extends('backend.layouts.panel')

@section('content')

<div class="card">

  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      {!! getItemAdminIcons($user,'user','True') !!}
    </span>
    @endif
    <h1><i class="fa fa-dot-circle-o"></i> {{ $user->name }}</h1>
  </div>

  <div class="card-body">

    <h2 class="p-2 bg-light"><i class="fa fa-youtube-play"></i> Cursos</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
            Teste de Curso 1
        </span>
        <span>E X</span>
      </li>
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
            Teste de Curso 2
        </span>
        <span>E X</span>
      </li>
    </ul>

    <h2 class="p-2 bg-light"><i class="fa fa-youtube-play"></i> Itens</h2>
    <ul class="list-group">
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
            Teste de Item 1
        </span>
        <span>E X</span>
      </li>
      <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
        <span>
            Teste de Item 2
        </span>
        <span>E X</span>
      </li>
    </ul>

  </div>

</div>

@endsection
