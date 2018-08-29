@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      <a href="{{ url('examination/'.$examination->id.'/question/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Questão</a>
      {!! getItemAdminIcons($examination,'examination','True') !!}
    </span>
    @endif
    <h1><i class="fa fa-clipboard"></i> Avaliação {{ $examination->sequence }}</h1>
    <div class="row">
      <div class="col-sm-6">
        Curso: <a href="{{ url('course/'.$examination->unity->course->id) }}">{{$examination->unity->course->title}}</a>
      </div>
      <div class="col-sm-6">
        Unidade: <a href="{{ url('unity/'.$examination->unity->id) }}">{{$examination->unity->title}}</a>
      </div>
    </div>
  </div>

  <div class="card-body">

    <form action="{{ url('/user/'.getUserId().'/examination/'.$examination->id) }}" method="POST" >

      {{ csrf_field() }}

      @if (isset($examination))
      <input type="hidden" name="_method" value="PUT">
      @endif

      <input type="hidden" name="examination_id" value="{{ $examination->id }}">
      <input type="hidden" name="user_id" value="{{ getUserId() }}">

      @foreach ($examination->questions()->orderBy('sequence')->get() as $question)
      <h2 class="bg-light p-2">Questão {{ $question->sequence }} {!! getItemAdminIcons($question,'question','False') !!}</h2>
      <div class="p-1">{!! $question->statement !!}</div>

      <div class="p-2">

        <div class="col-form-label">
          <div class="form-check mb-1">
            <input class="form-check-input" value="1" id="answer-1-{{ $question->id }}" name="question-{{ $question->id }}" type="radio">
            <label class="form-check-label" for="answer-1-{{ $question->id }}">
              a) {{$question->answer1}}
            </label>
          </div>
          <div class="form-check mb-1">
            <input class="form-check-input" value="2" id="answer-2-{{ $question->id }}" name="question-{{ $question->id }}" type="radio">
            <label class="form-check-label" for="answer-2-{{ $question->id }}">
              b) {{$question->answer2}}
            </label>
          </div>
          <div class="form-check mb-1">
            <input class="form-check-input" value="3" id="answer-3-{{ $question->id }}" name="question-{{ $question->id }}" type="radio">
            <label class="form-check-label" for="answer-3-{{ $question->id }}">
              c) {{$question->answer3}}
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" value="4" id="answer-4-{{ $question->id }}" name="question-{{ $question->id }}" type="radio">
            <label class="form-check-label" for="answer-4-{{ $question->id }}">
              d) {{$question->answer4}}
            </label>
          </div>
        </div>

        @if(isAdmin())
        <p class="text-muted">Resposta correta: {{$question->right_answer}}</p>
        @endif
      </div>
      @endforeach

    </form>

  </div>

</div>

@endsection
