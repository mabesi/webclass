<html lang="{{ app()->getLocale() }}">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- COREUI - Main styles for this application-->
    <link href="{{ asset("coreui/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("coreui/vendors/pace-progress/css/pace.min.css") }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

      @font-face {
        font-family: 'times',sans-serif;
      }

      @page{
        margin: 1.2em;
      }

      body{
        background-color: #fff;
        color: #5F7280;
      }

      .cbox{
        border: 25px #4D4D4D ridge;
        padding: 10px;
      }

      .certificate{
        border: 10px #4D4D4D double;
        color: #5F7280;
        font-family: 'times', sans-serif;
        background-color: #fff;
      }

    </style>
  </head>

<body>

  @if ($downloadButton)
  <div class="row text-center my-1">
    <div class="col-sm-12">
      <a href="{{ url('course/'.$course->id.'/pdf-certificate') }}" title="Clique para baixar seu certificado em PDF."
         class="btn btn-primary">Baixar Certificado em PDF</a>
    </div>
  </div>
  @endif

  <div class="cbox">

    <div class="certificate">

      <div class="row size-4"></div>

      <table width="100%">
        <tr>
          <td width="30%" class="text-center">
            <img src="{{ asset('img/logo-text.png') }}" width="240px" />
          </td>
          <td width="70%">
            <p class="display-2 font-weight-bold">CERTIFICADO</p>
          </td>
        </tr>
      </table>

      <div class="row size-4"></div>

        <div class="row">
          <div class="col-sm-12 text-center font-3xl font-italic">
            <p>Certificamos que <strong>{{ $user->name }}</strong> concluiu com aproveitamento o curso</p>
            <p class="font-4xl font-weight-bold text-center">{{ $course->title }}</p>
            <p>ministrado através do Sistema de Treinamento Online <strong>WebClass</strong>.</p>
          </div>
        </div>

        <div class="row size-2"></div>

      <div class="row p-2">
        <div class="col-sm-10">
          <p class="text-right font-2xl">Anápolis - GO, {{ getCompleteDate() }}.</p>
        </div>
        <div class="col-sm-2">
        </div>
      </div>

      <div class="row size-3"></div>

      <table width="100%">
        <tr>
          <td width="50%" class="text-center">
            <img src="{{ asset('img/assinatura.png') }}" width="160px"> <br />
            <span class="">Diretor WebClass</span>
          </td>
          <td width="50%" class="text-center">
            <div class="row size-4"></div>
            <span class="">________________________</span><br />
            <span class="">{{ $user->name }}</span>
          </td>
        </tr>
      </table>

      <div class="row size-3"></div>

    </div>

</div>

  <script src="{{ asset("coreui/vendors/jquery/js/jquery.min.js") }}"></script>
  <script src="{{ asset("coreui/vendors/bootstrap/js/bootstrap.min.js") }}"></script>
  <script src="{{ asset("coreui/vendors/pace-progress/js/pace.min.js") }}"></script>
  <script src="{{ asset("coreui/vendors/@coreui/coreui/js/coreui.min.js") }}"></script>

</body>
</html>
