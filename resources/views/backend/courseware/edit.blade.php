@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($courseware)?'Editar Arquivo':'Novo Arquivo' }}</strong>
  </div>

  <form action="{{ url('/courseware'.(isset($courseware->id)?'/'.$courseware->id:'')) }}"
     method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}

    @if (isset($courseware))
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

      </div>

      <div class="row">

        <div class="col-sm-12">
          <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" id="title" type="text" name="title"
            value="{{ old('title',isset($courseware->title)?$courseware->title:Null) }}" required>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-sm-12">
          <div class="form-group">
            <label for="courseware">Arquivo</label>

            <input class="form-control-file" id="courseware" name="courseware" type="file">
            <small class="text-muted">{{ isset($courseware->name)?'Arquivo atual: '.getDownloadName($courseware->name):Null }}</small>

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
