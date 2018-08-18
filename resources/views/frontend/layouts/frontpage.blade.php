@extends('frontend.layouts.base')

@push('all_css')

  <!-- Frontend Page Extra CSS -->
  @stack('css')
@endpush

@section('body')

  <!-- Navigation -->
  @include('frontend.layouts.navbar')

  <!-- Content -->
  @yield('content')

  <!-- Footer -->
  @include('frontend.layouts.footer')

  @push('all_scripts')

    <!-- Backend Page Extra Scripts -->
    @stack('scripts')
  @endpush

@endsection
