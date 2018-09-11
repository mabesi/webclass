@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <a href="{{ url('category/create') }}" class="btn btn-primary float-right" >Nova Categoria</a>
    @endif
    <h1><i class="fa fa-graduation-cap"></i> Categorias</h1>
  </div>
  <div class="card-body">

    <table class="table table-responsive-sm table-striped">
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Cursos</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td class="col-sm-5"><a href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a></td>
          <td class="col-sm-5">{{ $category->courses->count() }}</td>
          <td class="col-sm-2">{!! getItemAdminIcons($category,'category','False') !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $categories->links("pagination::bootstrap-4") }}

  </div>

</div>

@endsection
