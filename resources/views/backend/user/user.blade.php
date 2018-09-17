@extends('backend.layouts.panel')

@section('content')

<div class="card">

  <div class="card-header">
    <h1><i class="fa fa-user"></i> {{ $user->name }}</h1>
  </div>

  <div class="card-body">

    <h2>Relatório de Estudos por Curso</h2>
    <br>

    @foreach ($user->courses as $course)
    <h3 class="p-2 bg-light mt-2"><i class="fa fa-dot-circle-o"></i> {{ $course->title }}</h3>
    <div class="row p-2">
      <div class="col-sm-6 border p-2">

        Vídeos Assistidos: <b>{{ $course->progress($user->id,True) }}%</b><br>
        <br>

        @if ($course->progress($user->id)==100)
        <strong>Média Final: {!! getGradeBadge($course->average($user->id),'','text-white') !!}</strong><br>
        <strong>Resultado: {!! ($course->average($user->id)>=70 && $course->progress($user->id)==100)?'<span class="badge bg-success">APROVADO</span>':'<span class="badge bg-danger">REPROVADO</span>' !!}</strong>
        @endif

      </div>
      <div class="col-sm-6 border p-2">
        <strong>Resultados dos Exames</strong><br>
        @foreach($course->unities()->orderBy('sequence')->get() as $unity)
          @if($unity->examination!=Null)
            @if ($unity->examination->grade($user->id)!=Null)
            Exame {{ $unity->examination->sequence }}: {!! getGradeBadge($unity->examination->grade($user->id),'','text-white') !!}<br>
            @else
            Exame {{ $unity->examination->sequence }}: <span class="text-muted">Não realizado</span><br>
            @endif
          @endif
        @endforeach
      </div>
    </div>
    @endforeach

  </div>

</div>

@endsection
