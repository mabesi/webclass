@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($unity)?'Editar Unidade':'Nova Unidade' }}</strong>
  </div>

  <form action="{{ url('/unity'.(isset($unity->id)?'/'.$unity->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($unity))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <input type="hidden" name="course_id" value="{{ $course->id }}">

    <div class="card-body">
      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="course">Curso</label>
            <span class="form-control bg-light" id="course">{{ $course->title }}</span>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="category">Categoria</label>
            <span class="form-control bg-light" id="category">{{ $course->category->name }}</span>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-sm-2">
          <div class="form-group">
            <label for="sequence">Sequência</label>

            <input class="form-control" id="sequence" type="number" name="sequence"
            value="{{ old('name',isset($unity->sequence)?$unity->sequence:Null) }}"
            min="1" max="255" step="1" required>

          </div>
        </div>

        <div class="col-sm-10">
          <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" id="title" type="text" name="title"
            value="{{ old('name',isset($unity->title)?$unity->title:Null) }}" required>
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
