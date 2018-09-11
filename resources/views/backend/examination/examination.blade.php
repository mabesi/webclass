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

    <form action="{{ url('/examination/'.$examination->id.'/attempt') }}" method="POST" class="confirm-submition" data-message="Confirma o envio da avaliação?" >

      {{ csrf_field() }}

      @foreach ($examination->questions()->orderBy('sequence')->get() as $question)
      <h2 class="bg-light p-2">Questão {{ $question->sequence }} {!! getItemAdminIcons($question,'question','False') !!}</h2>
      <div class="p-1">{!! $question->statement !!}</div>

      <div class="p-2">

        <table class="table-responsive-sm table-sm mb-2">
          <tbody>
            <tr>
              <td class="align-top"><input value="1" id="answer-1-{{ $question->id }}" name="question-{{ $question->id }}" type="radio" required></td>
              <td class="align-top">A)</td>
              <td>{!! $question->answer1 !!}</td>
            </tr>
            <tr>
              <td class="align-top"><input value="2" id="answer-2-{{ $question->id }}" name="question-{{ $question->id }}" type="radio"></td>
              <td class="align-top">B)</td>
              <td>{!! $question->answer2 !!}</td>
            </tr>
            <tr>
              <td class="align-top"><input value="3" id="answer-3-{{ $question->id }}" name="question-{{ $question->id }}" type="radio"></td>
              <td class="align-top">C)</td>
              <td>{!! $question->answer3 !!}</td>
            </tr>
            <tr>
              <td class="align-top"><input value="4" id="answer-4-{{ $question->id }}" name="question-{{ $question->id }}" type="radio"></td>
              <td class="align-top">D)</td>
              <td>{!! $question->answer4 !!}</td>
            </tr>
          </tbody>
        </table>

      @if(isAdmin())
      <p class="text-muted">Resposta correta: {{$question->right_answer}}</p>
      @endif
    </div>
    @endforeach



</div>
<div class="card-footer">
  <div class="">
    <input type="submit" class="btn btn-primary" value="Enviar Respostas">
  </div>
</div>

</form>

</div>

@endsection
