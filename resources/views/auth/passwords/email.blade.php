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
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">

            <div class="card-body p-4">

              <h1>Recuperação de Senha</h1>
              <p class="text-muted">Informe um e-mail para receber o link de recuperação de senha:</p>

              {{ csrf_field() }}

              <div class="input-group mb-2{{ $errors->has('email') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

            </div>

            <div class="card-footer p-4">
              <button class="btn btn-block btn-primary" type="submit">Enviar Link</button>
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
