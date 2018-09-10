@extends('backend.layouts.panel')

@section('content')

<div class="row">

  @foreach ($courses as $course)
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-gray text-white">
        <span class="font-2xl" >{{ $course->title }}</span><br>
        {{ $course->category->name }}
      </div>
      <div class="card-footer text-right">
        <a href="{{ url('course/'.$course->id) }}" class="btn btn-primary" title="Entrar">Entrar <i class="fa fa-arrow-circle-right "></i></a>
      </div>
    </div>
  </div>
  @endforeach

</div>
<div class="row">
  <div class="col-sm-12">
    {{ $courses->links("pagination::bootstrap-4") }}
  </div>
</div>

@endsection
