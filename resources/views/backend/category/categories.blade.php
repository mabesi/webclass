@extends('backend.layouts.panel')

@section('content')

<div class="row">

  @foreach ($categories as $category)
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body bg-light">
        <span class="font-2xl" ><a href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a></span>
      </div>
      <div class="card-footer text-left text-white font-weight-bold bg-teal">
        {{ $category->courses->count() }} Curso{{ $category->courses->count()>1?'s':'' }}
      </div>
    </div>
  </div>
  @endforeach

</div>
<div class="row">
  <div class="col-sm-12">
    {{ $categories->links("pagination::bootstrap-4") }}
  </div>
</div>

@endsection
