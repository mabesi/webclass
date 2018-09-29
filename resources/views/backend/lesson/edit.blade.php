@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($lesson)?'Editar Videoaula':'Nova Videoaula' }}</strong>
  </div>

  <form action="{{ url('/lesson'.(isset($lesson->id)?'/'.$lesson->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($lesson))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <input type="hidden" name="unity_id" value="{{ $unity->id }}">

    <div class="card-body">

      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="course">Curso</label>
            <span class="form-control bg-light" id="course">{{ $unity->course->title }}</span>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="category">Unidade</label>
            <span class="form-control bg-light" id="category">{{ $unity->title }}</span>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-sm-2">
          <div class="form-group">
            <label for="sequence">Sequência *</label>

            <input class="form-control{{ $errors->has('sequence')?' is-invalid':'' }}" id="sequence" type="number" name="sequence"
            value="{{ old('sequence',isset($lesson->sequence)?$lesson->sequence:Null) }}"
            min="1" max="255" step="1" required>

          </div>
        </div>

        <div class="col-sm-10">
          <div class="form-group">
            <label for="title">Título *</label>
            <input class="form-control{{ $errors->has('title')?' is-invalid':'' }}" id="title" type="text" name="title"
            value="{{ old('title',isset($lesson->title)?$lesson->title:Null) }}" required>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Link Youtube *</label>

            <input class="form-control{{ $errors->has('link')?' is-invalid':'' }}" id="link" type="text" name="link"
            value="{{ old('link',isset($lesson->link)?$lesson->link:Null) }}" required>

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
