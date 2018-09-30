@extends('backend.layouts.panel')

@push('css')
  <link href="{{ asset('summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

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
            <label for="title">Título *</label>
            <input class="form-control{{ $errors->has('title')?' is-invalid':'' }}" id="title" type="text" name="title"
              value="{{ old('title',isset($course->title)?$course->title:Null) }}">
          </div>
        </div>

        <div class="col-sm-5">
          <div class="form-group">
            <label for="category">Categoria *</label>

            <select id="category" class="form-control{{ $errors->has('category_id')?' is-invalid':'' }}" name="category_id">
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
            @if (isset($course))
            <label for="status">Status *</label>

            <select class="form-control{{ $errors->has('status')?' is-invalid':'' }}" id="status" name="status" {{ isset($course)?'':'disabled' }}>
              @if($course->status=='N')
              <option value="N"
                 {{ ("N"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Novo
               </option>
              @endif
              <option value="E"
                 {{ ("E"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Em Elaboração
               </option>
              <option value="C"
                 {{ ("C"==(old('status',isset($course->status)?$course->status:''))?'selected':'') }} >Completo
               </option>
            </select>
            @else
            <label for="name">Status</label><br>
            <span id="status" class="badge bg-secondary font-xl">Novo</span>
            @endif
          </div>
        </div>

        </div>

        <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="instructor">Instrutor *</label>

            <select id="instructor" class="form-control{{ $errors->has('instructor_id')?' is-invalid':'' }}" name="instructor_id">
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
            <label for="keywords">Palavras-chave * <small>(Separadas por vírgula)</small></label>
            <input class="form-control{{ $errors->has('keywords')?' is-invalid':'' }}" id="keywords" type="text" name="keywords"
              value="{{ old('keywords',isset($course->keywords)?$course->keywords:Null) }}" >
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="{{ $errors->has('description')?'error-field p-2':'' }}">
            <div class="form-group">
              <label for="description">Descrição *</label>
              <textarea class="form-control summernote-large" id="description" name="description" rows="4"
              required>{{ old('description',isset($course->description)?$course->description:'') }}</textarea>

            </div>
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

@push('scripts')
  @include('backend.layouts.editor-scripts')
@endpush
