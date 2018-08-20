@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> Categorias
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <ul class="list-group">
          @foreach ($categories as $index => $category)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <a href="category/{{ $index }}">{{ $category }}</a>
            <span class="badge badge-primary badge-pill px-2">{{ rand(4,20) }}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

  </div>
</div>

@endsection
