@php
$i=1;
@endphp

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
    <h1><i class="fa fa-clipboard"></i> {{ $examination->sequence.' - '.$examination->title }}</h1>
  </div>

  <div class="card-body">

    <form action="{{ url('/user/'.getUserId().'/examination/'.$examination->id) }}" method="POST" >

      {{ csrf_field() }}

      @if (isset($examination))
      <input type="hidden" name="_method" value="PUT">
      @endif

      <input type="hidden" name="examination_id" value="{{ $examination->id }}">
      <input type="hidden" name="user_id" value="{{ getUserId() }}">

      @foreach ($examination->questions as $question)
      <p class="p-1 bg-light"><strong>{{ $i }})</strong> {{ $question->statement }} {!! getItemAdminIcons($question,'question','False') !!}</p>
      <div class="p-2">
        <p>a) {{$question->answer1}}</p>
        <p>b) {{$question->answer2}}</p>
        <p>c) {{$question->answer3}}</p>
        <p>d) {{$question->answer4}}</p>
        @if(isAdmin())
        <p>Resposta correta: {{$question->right_answer}}</p>
        @endif
      </div>
      <span hidden>{{ $i++ }}</span>
      @endforeach

    </form>

  </div>

</div>

@endsection
