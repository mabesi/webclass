@extends('backend.layouts.panel')

@push('css')
  <link href="{{ asset('summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($trail)?'Editar Trilha':'Nova Trilha' }}</strong>
  </div>

  <form action="{{ url('/trail'.(isset($trail->id)?'/'.$trail->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($trail))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="card-body">

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="title">Título *</label>
            <input class="form-control{{ $errors->has('title')?' is-invalid':'' }}" id="title" type="text" name="title"
            value="{{ old('title',isset($trail->title)?$trail->title:Null) }}" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="{{ $errors->has('description')?'error-field p-2':'' }}">
            <div class="form-group">
              <label for="description">Descrição *</label>
              <textarea class="form-control summernote-large" id="description" name="description" rows="4"
              required>{{ old('description',isset($trail->description)?$trail->description:'') }}</textarea>

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
