@extends('layouts.panel')

@section('content')

<h1 class="page-title">CURSO</h1>

<div class="module message">
  <div class="module-head">
    <h3>{{ $course->title }}</h3>
  </div>
  <div class="module-option clearfix">

    <p>Categoria: {{ $course->category }}</p>
    <p>Instrutor: {{ $course->instructor }}</p>
    <p>Palavras-chave: {{ $course->keywords }}</p>

  </div>
</div>

@endsection
