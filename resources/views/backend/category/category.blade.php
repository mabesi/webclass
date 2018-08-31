@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <span class="float-right">
      {!! getItemAdminIcons($category,'category','True') !!}
    </span>
    <h1><i class="fa fa-file-text-o"></i> {{ $category->name }}</h1>
  </div>
  <div class="card-body">

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Curso</th>
          <th>Instrutor</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category->courses as $course)
        <tr>
          <td class="col-sm-6"><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a> {!! getCourseStarIcon($course,True,'warning') !!}</td>
          <td class="col-sm-5"><a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a></td>
          <td class="col-sm-1">{!! getItemAdminIcons($course,'course','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection
