@extends('backend.layouts.panel')

@section('content')

<div class="row">

  @foreach ($courses as $course)
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body bg-{{ $course->progress()==100?($course->average()>=70?'green':'danger'):($course->progress()==0?'gray-500':'cyan') }} text-white">
        <span class="font-2xl" >{{ $course->title }}</span><br>
        {{ $course->category->name }}
      </div>
      <div class="card-footer">
        @if($course->progress()<100)
          <span class="font-xl text-primary">{{ $course->progress() }}%</span>
        @else
          @if($course->average()>=70)
          <span class="font-xl text-success">APROVADO</span>
          @else
          <span class="font-xl text-danger">REPROVADO</span>
          @endif
        @endif
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
<div class="row">
  <div class="col-sm-12">
    <span class="bg-gray-500 text-center p-2 rounded">{{ nbsp(4) }}</span> Recém-inscrito
    <span class="bg-cyan text-center p-2 rounded ml-2">{{ nbsp(4) }}</span> Cursando
    <span class="bg-green text-center p-2 rounded ml-2">{{ nbsp(4) }}</span> Aprovado
    <span class="bg-danger text-center p-2 rounded ml-2">{{ nbsp(4) }}</span> Reprovado
  </div>
</div>

@endsection
