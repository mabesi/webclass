@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <h1><i class="fa fa-align-justify"></i> Curso</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <p>Curso: {{ $course->title }}</p>
        <p>Categoria: {{ $course->category->name }}</p>
        <p>Instrutor: {{ $course->instructor->name }}</p>
        <p>Palavras-chave: {{ $course->keywords }}</p>
      </div>
    </div>

  </div>
</div>

@endsection
