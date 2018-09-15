<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="nav-icon icon-home"></i> Home
        </a>
      </li>

      <li class="nav-divider"></li>

      @if(isAdmin())
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-people"></i> Alunos</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('user') }}">
              <i class="nav-icon icon-list ml-2"></i> Lista de Alunos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('user/create') }}">
              <i class="nav-icon icon-user-follow ml-2"></i> Novo Aluno</a>
          </li>
        </ul>
      </li>
      @endif

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-list"></i> Cursos</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('course') }}">
              <i class="nav-icon icon-list ml-2"></i> Lista de Cursos</a>
          </li>
          @if(isAdmin())
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('course/create') }}">
              <i class="nav-icon icon-plus ml-2"></i> Novo Curso</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('mycourses') }}">
              <i class="nav-icon icon-menu ml-2"></i> Meus Cursos</a>
          </li>
          @endif
        </ul>
      </li>

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-grid"></i> Categorias</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('category') }}">
              <i class="nav-icon icon-list ml-2"></i> Lista de Categorias</a>
          </li>
          @if(isAdmin())
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('category/create') }}">
              <i class="nav-icon icon-plus ml-2"></i> Nova Categoria</a>
          </li>
          @endif
        </ul>
      </li>

      @if(isAdmin())
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-graduation"></i> Instrutores</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('instructor') }}">
              <i class="nav-icon icon-list ml-2"></i> Lista de Instrutores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('instructor/create') }}">
              <i class="nav-icon icon-plus ml-2"></i> Novo Instrutor</a>
          </li>
        </ul>
      </li>
      @endif

      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon icon-map"></i> Trilhas</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('trail') }}">
              <i class="nav-icon icon-list ml-2"></i> Lista de Trilhas</a>
          </li>
          @if(isAdmin())
          <li class="nav-item">
            <a class="nav-link bg-gray-700" href="{{ url('trail/create') }}">
              <i class="nav-icon icon-plus ml-2"></i> Nova Trilha</a>
          </li>
          @endif
        </ul>
      </li>

      <li class="nav-divider"></li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon icon-logout"></i> Logout
        </a>
      </li>

    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
