@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($examination)?'Editar Exame':'Novo Exame' }}</strong>
  </div>

  <form action="{{ url('/examination'.(isset($examination->id)?'/'.$examination->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($examination))
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
            <label for="sequence">Sequência</label>

            <input class="form-control" id="sequence" type="number" name="sequence"
            value="{{ old('sequence',isset($examination->sequence)?$examination->sequence:Null) }}"
            min="1" max="255" step="1" required>

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
