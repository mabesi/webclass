@extends('frontend.layouts.frontpage')

@push('css')
  <!-- Business Frontpage -->
  <link href="{{ asset("css/business-frontpage.css") }}" rel="stylesheet">
@endpush

@section('content')

<!-- Header with Background Image -->
<header class="business-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>
  </div>
</header>

<!-- Page Content -->
<div class="container">

  <h1 class="display-4 text-center text-dark mt-4">Sistema de Treinamento Online</h1>

  <div class="row">
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/trilhas.jpg') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Conheça as Trilhas de Formação</h4>
          <p class="card-text">O WebClass possui trilhas de formação para ajudar a direcioná-lo, sugerindo cursos que se complementam de tal forma que seus estudos se concentrem em determinada área de especialização.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/cursos.jpg') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Faça os Cursos</h4>
          <p class="card-text">Cada curso possui o conteúdo dividido em unidades de estudo, e estas são dividias em videoaulas e exames com questões de múltipla escolha.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 my-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('img/certificado.jpg') }}" alt="">
        <div class="card-body">
          <h4 class="card-title">Obtenha o Certificado</h4>
          <p class="card-text">Assista às videoaulas e realize os exames. Assim que forem concluídas as aulas e você obter média igual ou maior que 70% nos exames poderá solicitar seu certificado.</p>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection
