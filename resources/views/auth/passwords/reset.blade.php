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

          <form method="POST" action="{{ route('password.request') }}">

            <div class="card-body p-4">

              <h1>New Password</h1>
              <p class="text-muted">Enter your email and your new password</p>

              {{ csrf_field() }}

              <div class="input-group mb-2{{ $errors->has('email') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" id="email" type="email" name="email" value="{{ $email or old('email') }}" placeholder="Email" required>
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
                <input class="form-control" id="password" type="password" name="password" placeholder="New password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>

              <div class="input-group mb-3{{ $errors->has('password_confirm') ? ' was-validated' : '' }}">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input class="form-control" id="password_confirm" type="password" name="password_confirmation" placeholder="Repeat new password" required>
                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password_confirm') }}</strong>
                </span>
                @endif
              </div>

            </div>

            <div class="card-footer p-4">
              <button class="btn btn-block btn-primary" type="submit">Reset Password</button>
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
