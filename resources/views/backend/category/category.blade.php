@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <h1><i class="fa fa-file-text-o"></i> CATEGORIA</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <h2>{{ $category->name }}</h2>
      </div>
    </div>

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Título</th>
          <th>Instrutor</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category->courses as $course)
        <tr>
          <td class="col-sm-6"><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a></td>
          <td class="col-sm-5"><a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a></td>
          <td class="col-sm-1">{!! getItemAdminIcons($course,'course','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection
