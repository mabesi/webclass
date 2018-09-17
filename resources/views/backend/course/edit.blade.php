@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($course)?'Editar Curso':'Novo Curso' }}</strong>
  </div>

  <form action="{{ url('/course'.(isset($course->id)?'/'.$course->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($course))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="card-body">
      <div class="row">

        <div class="col-sm-5">
          <div class="form-group">
            <label for="title">Título</label>
            <input class="form-control" id="title" type="text" name="title"
              value="{{ old('name',isset($course->title)?$course->title:Null) }}">
          </div>
        </div>

        <div class="col-sm-5">
          <div class="form-group">
            <label for="name">Categoria</label>

            <select class="form-control" name="category_id">
              <option value=""></option>
              @foreach ($categories as $category)
              <option
                 value="{{ $category->id }}"
                 {{ ($category->id==(old('category_id',isset($course->category_id)?$course->category_id:''))?'selected':'') }} >
                 {{ $category->name }}
               </option>
              @endforeach
            </select>

          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label for="name">Status</label>

            <select class="form-control" name="status" {{ isset($course)?'':'disabled' }}>
              <option value="N"
                 {{ ("N"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Novo
               </option>
              <option value="E"
                 {{ ("E"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Em Elaboração
               </option>
              <option value="C"
                 {{ ("C"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Completo
               </option>
            </select>

          </div>
        </div>

        </div>

        <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="name">Instrutor</label>

            <select class="form-control" name="instructor_id">
              <option value=""></option>
              @foreach ($instructors as $instructor)
              <option
                 value="{{ $instructor->id }}"
                 {{ ($instructor->id==(old('instructor_id',isset($course->instructor_id)?$course->instructor_id:''))?'selected':'') }} >
                 {{ $instructor->name }}
               </option>
              @endforeach
            </select>

          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="keywords">Palavras-chave</label>
            <input class="form-control" id="keywords" type="text" name="keywords"
              value="{{ old('keywords',isset($course->keywords)?$course->keywords:Null) }}" >
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
