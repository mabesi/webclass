@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($category)?'Editar Categoria':'Nova Categoria' }}</strong>
  </div>

  <form action="{{ url('/category'.(isset($category->id)?'/'.$category->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($category))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="card-body">
      <div class="row">

        <div class="col-sm-4">
          <div class="form-group">
            <label for="name">Nome *</label>
            <input class="form-control{{ $errors->has('name')?' is-invalid':'' }}" id="name" type="text" name="name"
              value="{{ old('name',isset($category->name)?$category->name:Null) }}">
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
