@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> Curso
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <p>Curso: {{ $course->title }}</p>
        <p>Categoria: {{ $course->category }}</p>
        <p>Instrutor: {{ $course->instructor }}</p>
        <p>Palavras-chave: {{ $course->keywords }}</p>
      </div>
    </div>

  </div>
</div>

@endsection
