@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <a href="{{ url('user/create') }}" class="btn btn-primary float-right" >Novo Aluno</a>
    <h1><i class="fa fa-group"></i> Alunos</h1>
  </div>
  <div class="card-body">
    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Cursos</th>
          <th>E-mail</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>
            {{ $user->name }}
            @if ($user->courses()->count()>0)
            <a href="{{ url('user/'.$user->id) }}" class="btn btn-sm btn-primary ml-2">Ver Relatório</a>
            @endif
          </td>
          <td>{{ $user->courses()->count() }}</td>
          <td>{{ $user->email }}</td>
          <td class="text-right">{!! getItemAdminIcons($user,'user','False') !!}<td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links("pagination::bootstrap-4") }}
  </div>
</div>

@endsection
