@extends('backend.layouts.base')

@push('all_css')

<!-- Backend Page Extra CSS -->
@stack('css')
@endpush

@section('body')

<body class="app flex-row align-items-center">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card-group">
          <div class="card p-4">

            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Faça login para acessar sua conta</p>

              <form method="POST" action="{{ route('login') }}">

                {{ csrf_field() }}

                <div class="input-group mb-3{{ $errors->has('email')?' was-validated' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                  </div>
                  <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="input-group mb-4{{ $errors->has('password') ? ' was-validated' : '' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-lock"></i></span>
                  </div>
                  <input class="form-control" type="password" name="password" placeholder="Senha" required>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="input-group mb-4">
                  <label class="checkbox text-muted">
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
									</label>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                  <div class="col-sm-6 text-right">
                    <a href="{{ route('password.request') }}" class="btn btn-link px-0" >Esqueceu sua senha?</a>
                  </div>
                </div>

              </form>

            </div>

          </div>

          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>WebClass</h2>
                <p>Sistema de Treinamento Online.</p>
                <img src="{{ asset('img/logo.png') }}" alt="" width="50%">
              </div>
            </div>
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
