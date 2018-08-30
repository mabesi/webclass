@extends('backend.layouts.panel')

@push('css')
  <link href="{{ asset('summernote/summernote-bs4.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="card">
  <div class="card-header">
    <strong>{{ isset($question)?'Editar Questão':'Nova Questão' }}</strong>
  </div>

  <form action="{{ url('/question'.(isset($question->id)?'/'.$question->id:'')) }}" method="POST" >

    {{ csrf_field() }}

    @if (isset($question))
    <input type="hidden" name="_method" value="PUT">
    @endif

    <input type="hidden" name="examination_id" value="{{ $examination->id }}">

    <div class="card-body">

      <div class="row">

        <div class="col-sm-7">
          <div class="form-group">
            <label for="course">Unidade</label>
            <span class="form-control bg-light" id="course">{{ $examination->unity->title }}</span>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label for="category">Avaliação</label>
            <span class="form-control bg-light" id="category">{{ $examination->sequence }}</span>
          </div>
        </div>

        <div class="col-sm-2">
          <div class="form-group">
            <label for="sequence">Número da Questão</label>

            <input class="form-control" id="sequence" type="number" name="sequence"
            value="{{ old('sequence',isset($question->sequence)?$question->sequence:Null) }}"
            min="1" max="255" step="1" required>

          </div>
        </div>

        <div class="col-sm-1">
          <div class="form-group">
            <label for="save-up" class="btn btn-primary" title="Salvar"><i class="fa fa-save" ></i></label>
            <input id="save-up"  type="submit" value="" hidden />
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-sm-12">
          <div class="form-group">
            <label for="title">Enunciado</label>
            <textarea id="statement" name="statement" rows="6" class="form-control summernote"
            required>{{ old('statement',isset($question->statement)?$question->statement:Null) }}</textarea>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Resposta 1</label>
            <textarea id="answer1" name="answer1" rows="2" class="form-control summernote-small"
            required>{{ old('answer1',isset($question->answer1)?$question->answer1:'') }}</textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Resposta 2</label>
            <textarea id="answer2" name="answer2" rows="2" class="form-control summernote-small"
            required>{{ old('answer2',isset($question->answer2)?$question->answer2:'') }}</textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Resposta 3</label>
            <textarea id="answer3" name="answer3" rows="2" class="form-control summernote-small"
            required>{{ old('answer3',isset($question->answer3)?$question->answer3:'') }}</textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Resposta 4</label>
            <textarea id="answer4" name="answer4" rows="2" class="form-control summernote-small"
            required>{{ old('answer4',isset($question->answer4)?$question->answer4:'') }}</textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="sequence">Resposta Correta</label>
            <div class="col-form-label">
              <div class="form-check form-check-inline mr-2">
                <input class="form-check-input" id="right_answer-1" value="1" name="right_answer" type="radio"
                 {{ isset($question)?($question->right_answer==1?'checked':''):'' }}>
                <label class="form-check-label" for="right_answer-1">1</label>
              </div>
              <div class="form-check form-check-inline mr-3">
                <input class="form-check-input" id="right_answer-2" value="2" name="right_answer" type="radio"
                 {{ isset($question)?($question->right_answer==2?'checked':''):'' }}>
                <label class="form-check-label" for="right_answer-2">2</label>
              </div>
              <div class="form-check form-check-inline mr-3">
                <input class="form-check-input" id="right_answer-3" value="3" name="right_answer" type="radio"
                 {{ isset($question)?($question->right_answer==3?'checked':''):'' }}>
                <label class="form-check-label" for="right_answer-3">3</label>
              </div>
              <div class="form-check form-check-inline mr-3">
                <input class="form-check-input" id="right_answer-4" value="4" name="right_answer" type="radio"
                 {{ isset($question)?($question->right_answer==4?'checked':''):'' }}>
                <label class="form-check-label" for="right_answer-4">4</label>
              </div>
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
