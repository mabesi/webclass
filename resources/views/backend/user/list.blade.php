@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> Alunos
  </div>
  <div class="card-body">
    <table class="table table-responsive-sm table-striped">
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
          <td>{!! getItemAdminIcons($user,'user','False') !!}<td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links("pagination::bootstrap-4") }}
  </div>
</div>

@endsection
