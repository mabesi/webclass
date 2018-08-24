@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      <a href="{{ url('course/create') }}" class="btn btn-primary mx-1" >Incluir Unidade</a>
      <a href="{{ url('course') }}" class="btn btn-primary mx-1" >Incluir Arquivo</a>
    </span>
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

  <div class="card-footer">
    <div class="row">
      <div class="col-sm-4">
        Teste
      </div>
      <div class="col-sm-8">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/FWQN8DD11oY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

@endsection
