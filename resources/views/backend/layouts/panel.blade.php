@extends('backend.layouts.base')

@push('all_css')

  <!-- Backend Page Extra CSS -->
  @stack('css')
@endpush

@section('body')

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

  @include('backend.layouts.navbar')

  <div class="app-body">

    @include('backend.layouts.sidemenu')

    <main class="main">

      @include('backend.layouts.messages')
      @include('backend.layouts.breadcrumbs')

      <div class="mb-3">
      </div>

      <div class="container-fluid">
        <div class="animated fadeIn">

          @yield('content')

        </div>
      </div>
    </main>

  </div><!-- End of app-body -->

  @include('backend.layouts.footer')

  @push('all_scripts')

  <!-- Backend Page Extra Scripts -->
  @stack('scripts')
  @endpush

  @endsection
