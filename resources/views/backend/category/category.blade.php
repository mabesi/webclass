@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> Categoria
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        {{ $category }}
      </div>
    </div>

  </div>
</div>

@endsection
