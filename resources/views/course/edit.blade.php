@extends('layouts.panel')

@section('content')

<h1 class="page-title">Usuários</h1>

<div class="module message">
  <div class="module-head">
    <h3>{{ isset($user)?'Editar Aluno':'Novo Aluno' }}</h3>
  </div>
  <div class="module-option clearfix">

    <form action="{{ url('/user'.(isset($user->id)?'/'.$user->id:'')) }}" method="POST" >

      {{ csrf_field() }}

      @if (isset($user))
        <input type="hidden" name="_method" value="PUT">
      @endif

      <div class="row-fluid">
        <div class="span3">
          <input class="span11" placeholder="Nome..." type="text" name="name"
          value="{{ old('name',isset($user->name)?$user->name:Null) }}" >
        </div>
        <div class="span4">
          <input class="span11" placeholder="E-mail..." type="email" name="email"
          value="{{ old('email',isset($user->email)?$user->email:Null) }}" >
        </div>
        <div class="span3">
          <input class="span11" placeholder="Senha..." type="password" name="password" >
        </div>
        <div class="span2">
          <input type="submit" class="btn btn-primary pull-right" value="Salvar">
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
