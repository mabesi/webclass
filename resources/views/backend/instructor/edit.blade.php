@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($instructor)?'Editar Instrutor':'Novo Instrutor' }}</strong>
  </div>

  <form action="{{ url('/instructor'.(isset($instructor->id)?'/'.$instructor->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($instructor))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="card-body">
      <div class="row">

        <div class="col-sm-4">
          <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" type="text" name="name"
              value="{{ old('name',isset($instructor->name)?$instructor->name:Null) }}">
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
