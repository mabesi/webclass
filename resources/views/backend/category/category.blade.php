@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <h1><i class="fa fa-file-text-o"></i> CATEGORIA</h1>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        {{ $category->name }}
      </div>
    </div>

  </div>
</div>

@endsection
