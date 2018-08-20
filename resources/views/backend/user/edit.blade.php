@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($user)?'Editar Aluno':'Novo Aluno' }}</strong>
  </div>

  <form action="{{ url('/user'.(isset($user->id)?'/'.$user->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($user))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="card-body">
      <div class="row">

        <div class="col-sm-4">
          <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" type="text" name="name"
              value="{{ old('name',isset($user->name)?$user->name:Null) }}">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="ccnumber">E-mail</label>
            <input class="form-control" id="ccnumber" type="email" name="email"
              value="{{ old('email',isset($user->email)?$user->email:Null) }}" >
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="ccnumber">Senha</label>
            <input class="form-control" id="password" type="password" name="password">
          </div>
        </div>

      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>


  </form>

</div>
</div>

@endsection
