@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      {!! getItemAdminIcons($instructor,'instructor','True') !!}
    </span>
    @endif
    <h1><i class="fa fa-file-text-o"></i> {{ $instructor->name }}</h1>
  </div>
  <div class="card-body">

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Curso</th>
          <th>Categoria</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($instructor->courses as $course)
        <tr>
          <td><a href="{{ url('course/'.$course->id) }}">{{ $course->title }}</a></td>
          <td><a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a></td>
          <td class="text-right">{!! getItemAdminIcons($course,'course','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection
