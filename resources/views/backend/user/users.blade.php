@extends('layouts.panel')

@section('content')

<h1 class="page-title">USUÁRIOS</h1>

<div class="module message">
  <div class="module-head">
    <h3>Lista de Alunos</h3>
  </div>
  <div class="module-option clearfix">
    <form>
      <div class="input-append pull-left">
        <input class="span3" placeholder="Pesquisar pelo nome..." type="text" name="search"
        value="{{ isset($user->password)?$user->password:Null }}">
        <button type="submit" class="btn">
          <i class="icon-search"></i>
        </button>
      </div>
    </form>
  </div>

  <div class="module-body">

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
@foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            {!! getItemAdminIcons($user,'user','False') !!}
        </tr>
@endforeach
      </tbody>
    </table>

  </div>
  <div class="module-foot pagination">
      {{ $users->links() }}
  </div>
</div>

@endsection
