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

          <div class="card-body p-4">

            <h1>Register</h1>
            <p class="text-muted">Create your account</p>

            <form method="POST" action="{{ route('register') }}">

              {{ csrf_field() }}

              <div class="input-group mb-2{{ $errors->has('name')?' was-validated':'' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Username" required>
                @if ($errors->has('name'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-2{{ $errors->has('email') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-2{{ $errors->has('password') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-3{{ $errors->has('password_confirmation') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Repeat password" required>
                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-2{{ $errors->has('password') ? ' was-validated' : '' }}">
                <label class="checkbox text-muted">
                  <input type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}> I agree to the <a href="{{ route('terms') }}" target="_blank">terms</a>.
                </label>
                @if ($errors->has('terms'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('terms') }}</strong>
                </span>
                @endif
              </div>

              <button class="btn btn-block btn-warning" type="submit">Create Account</button>

            </form>

            <a href="{{ route('login') }}" class="btn btn-block btn-secondary mt-2">Do you already have an account? Sign in</a>
          </div>

          <div class="card-footer p-4">
            <div class="text-center">
              <p class="text-muted">Or sign-up with your social accounts</p>
            </div>
            <div class="row">
              <div class="col-6">
                <button class="btn btn-block btn-facebook" type="button">
                  <span>Facebook</span>
                </button>
              </div>
              <div class="col-6">
                <button class="btn btn-block btn-twitter" type="button">
                  <span>Twitter</span>
                </button>
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
