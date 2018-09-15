  <!-- Breadcrumb-->
@if (isset($breadcrumbs))

  <ul class="nav navbar-nav d-md-dodwn-none">
    <li class="nav-item">
      <button type="button" class="btn btn-default text-muted btn-sm my-0 mx-2" onClick="history.go(-1)">
        <i class="fa fa-arrow-circle-left mr-2"></i>Voltar
      </button>
    </li>
    <li class="nav-item text-left">
      <ul class="bread">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
        </li>
        {!! createBreadcrumbs($breadcrumbs) !!}
      </ul>
    </li>
  </ul>

@endif
