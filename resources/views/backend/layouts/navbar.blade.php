<header class="app-header navbar">
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ route('home') }}">
    <img class="navbar-brand-full" src="{{ asset("img/logo-text.png") }}" height="40" alt="CoreUI Logo">
    <img class="navbar-brand-minimized" src="{{ asset("img/logo.png") }}" width="30" height="30" alt="CoreUI Logo">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>

  @include('backend.layouts.breadcrumbs')

  <ul class="nav navbar-nav ml-auto">

    <li class="nav-item dropdown">

      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle-o font-2xl text-info"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <div class="text-center bg-gray-200 p-2 text-muted">
          <strong>{{ getUserName() }}</strong>
        </div>

        <div class="divider"></div>
        <a class="dropdown-item" href="{{ url('change-password') }}">
          <i class="fa fa-shield"></i> Alterar Senha</a>

        <a href="{{ route('logout') }}" class="dropdown-item"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-retweet"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

      </div>
    </li>
  </ul>

</header>
