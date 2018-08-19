@extends('backend.layouts.panel')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <ul class="list-group">
        @foreach ($categories as $category)
        <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
          {{ $category }}
          <span class="badge badge-primary badge-pill px-2">{{ rand(4,20) }}</span>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

@endsection
