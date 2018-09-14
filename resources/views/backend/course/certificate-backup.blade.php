@extends('backend.layouts.base')

@section('body')

  <div class="row">
    <div class="col-sm-12">
      <figure class="certificate">

        <div class="row size-2"></div>

        <div class="row p-1">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-2 text-left pl-4">
            <img src="{{ asset('img/logo-text.png') }}" width="240px" />
          </div>
          <div class="col-sm-8 text-left">
          </div>
        </div>

        <div class="row p-1">
        <div class="col-sm-12 text-center">
          <p class="display-3 font-weight-bold">CERTIFICADO</p>
        </div>
        </div>

        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-10 text-center font-3xl font-italic">
            <p>Certificamos que <strong>{{ $user->name }}</strong> concluiu o curso</p>
            <p class="font-4xl font-weight-bold text-center">{{ $course->title }}</p>
            <p>ministrado através do Sistema de Treinamento Online <strong>WebClass</strong>.</p>
          </div>
        </div>

      <div class="row p-2">
        <div class="col-sm-11">
          <p class="text-right font-2xl">Anápolis - GO, {{ getCompleteDate() }}.</p>
        </div>
        <div class="col-sm-1">

        </div>
      </div>

      <div class="row p-3">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-4 text-center font-xl">
          <img src="{{ asset('img/assinatura.png') }}" width="160px"> <br />
          <span class="">Diretor WebClass</span>
        </div>
        <div class="col-sm-5 text-center font-xl">
          <div class="row size-4"></div>
          <span class="">________________________</span><br />
          <span class="">{{ $user->name }}</span>
        </div>
        <div class="col-sm-1">

        </div>

      </div>
      <div class="row size-2"></div>

      </figure>
    </div>
  </div>

@endsection
