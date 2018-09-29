@extends('backend.layouts.base')

@push('all_css')

<!-- Backend Page Extra CSS -->
@stack('css')
@endpush

@section('body')

<body class="app flex-row align-items-center">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mx-4">
          @if (session('status'))
            <div class="alert alert-info">
                {{ session('status') }}
            </div>
          @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.request') }}">

            <div class="card-body p-4">

              <h1>Nova Senha</h1>
              <p class="text-muted">Informe seu e-mail e a nova senha</p>

              {{ csrf_field() }}

              <input type="hidden" name="token" value="{{ $token }}">

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" name="email" value="{{ $email or old('email') }}" placeholder="E-mail" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" placeholder="Nova senha" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="password_confirm" type="password" name="password_confirmation" placeholder="Confirme a nova senha" required>
                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>

            </div>

            <div class="card-footer p-4">
              <button class="btn btn-block btn-primary" type="submit">Gravar Nova Senha</button>
            </div>

          </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  @push('all_scripts')

  <!-- Backend Page Extra Scripts -->
  @stack('scripts')
  @endpush

  @endsection
