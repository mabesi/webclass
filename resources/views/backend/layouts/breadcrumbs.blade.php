
  <!-- Breadcrumb-->
  @if (isset($breadcrumbs))
  <ol class="breadcrumb">
    <li>
      <button type="button" class="btn btn-default btn-sm my-0 mr-4" onClick="history.go(-1)">
        <i class="fa fa-arrow-circle-left "></i>{{nbsp(2)}}Voltar
      </button>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a></li>
    {!! createBreadcrumbs($breadcrumbs) !!}
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
      <div class="btn-group" role="group" aria-label="Button group">

        <a class="btn" href="#">
          <i class="icon-settings"></i></a>

      </div>
    </li>
  </ol>
  @else
  <div class="mb-3">

  </div>
  @endif
