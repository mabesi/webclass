@extends('backend.layouts.panel')

@section('content')

<div class="row">

  @foreach ($courses as $course)
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body bg-{{ $course->progress()==100?'green':($course->progress()==0?'gray-500':'cyan') }} text-white">
        <span class="font-2xl" >{{ $course->title }}</span><br>
        {{ $course->category->name }}
      </div>
      <div class="card-footer">
        <span class="font-xl text-primary">{{ $course->progress() }}%</span>
        <span class="float-right">
          <a href="{{ url('course/'.$course->id) }}" class="btn btn-primary" title="Entrar">Entrar <i class="fa fa-arrow-circle-right "></i></a>
        </span>
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
