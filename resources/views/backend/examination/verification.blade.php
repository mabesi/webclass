@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <h1>
      <i class="fa fa-clipboard"></i> Exame {{ $examination->sequence }}
      <span class="badge bg-{{ $pivot->grade>=70?'success':'red' }} text-white float-right">
        Nota: {{ $pivot->grade }}
      </span>
    </h1>
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

      @foreach ($examination->questions()->orderBy('sequence')->get() as $question)
      <h2 class="bg-light p-2">Questão {{ $question->sequence }}</h2>
      <div class="p-1">{!! $question->statement !!}</div>

      <div class="p-2">

        <table class="table-responsive-sm table-sm mb-2">
          <tbody>
            <tr>
              <td class="align-top">{!! getAnswerIcon(1,$answer[$question->id],$question->right_answer) !!}</td>
              <td class="align-top">A)</td>
              <td>{!! $question->answer1 !!}</td>
            </tr>
            <tr>
              <td class="align-top">{!! getAnswerIcon(2,$answer[$question->id],$question->right_answer) !!}</td>
              <td class="align-top">B)</td>
              <td>{!! $question->answer2 !!}</td>
            </tr>
            <tr>
              <td class="align-top">{!! getAnswerIcon(3,$answer[$question->id],$question->right_answer) !!}</td>
              <td class="align-top">C)</td>
              <td>{!! $question->answer3 !!}</td>
            </tr>
            <tr>
              <td class="align-top">{!! getAnswerIcon(4,$answer[$question->id],$question->right_answer) !!}</td>
              <td class="align-top">D)</td>
              <td>{!! $question->answer4 !!}</td>
            </tr>
          </tbody>
        </table>

    </div>
    @endforeach

</div>
<div class="card-footer">
  <div class="">
    <a href="{{ url('examination/'.$examination->id.'/retry') }}" class="btn btn-warning confirm-link"
       data-message="Deseja refazer a avaliação?\n\nA avaliação atual será perdida." >Nova Tentativa</a>
  </div>
</div>

</div>

@endsection
