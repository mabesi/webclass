@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <h1><i class="fa fa-graduation-cap"></i> {{ $course->title }} {!! getCourseStarIcon($course,False,'warning') !!}</h1>
    <div class="row">
      <div class="col-sm-3">
        Categoria: <a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a>
      </div>
      <div class="col-sm-4">
        Instrutor: <a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a>
      </div>
      <div class="col-sm-5">
        Palavras-chave:{!! getKeywordsLinks($course->keywords) !!}
      </div>
    </div>
  </div>

  <div class="card-body">

      <div class="list-group">
      @foreach ($course->ratings()->orderBy('created_at','desc')->get() as $rating)

        <div class="list-group-item flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{!! getStars($rating->rate) !!}</h5>
            <small class="text-muted">{{ humanPastTime($rating->created_at) }}</small>
          </div>
          @if (isAdmin())
          <span class="float-right">
            <a href="{{ url('rating/'.$rating->id.'/remove') }}" class="btn btn-outline-danger btn-sm">
              <i class="fa fa-trash" ></i>
            </a>
          </span>
          @endif
          <p class="mb-1">{{ $rating->comment }}</p>
          <small class="text-muted">{{ $rating->user->name }}</small>
        </div>

      @endforeach
    </div>

  </div>

</div>

@endsection
