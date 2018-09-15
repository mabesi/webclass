@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    <strong>Alterar Senha</strong>
  </div>

  <form action="{{ url('change-password') }}" method="POST" >

    {{ csrf_field() }}

    <div class="card-body">
      <div class="row">

        <div class="col-sm-4">
          <div class="form-group">
            <label for="password">Senha Atual</label>
            <input class="form-control" id="password" type="password" name="password" required>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="newPassword">Nova Senha</label>
            <input class="form-control" id="newPassword" type="password" name="newpassword" required>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="form-group">
            <label for="confirmPassword">Confirme a Senha</label>
            <input class="form-control" id="confirmPassword" type="password" name="newpassword_confirmation" required>
          </div>
        </div>

      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Alterar Senha</button>
    </div>

  </form>

</div>
</div>






@endsection
