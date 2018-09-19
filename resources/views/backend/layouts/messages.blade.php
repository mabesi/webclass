@if (isset($errors) && count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show mb-1" role="alert">
  @foreach ($errors->all() as $error)
  <div class="my-1"><i class="fa fa-remove"></i> {{ $error }}</div>
  @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session('problems'))
<div class="alert alert-danger alert-dismissible fade show mb-1" role="alert">
  @foreach (session('problems') as $problem)
  <div class="my-1"><i class="fa fa-ban"></i> {{ $problem }}</div>
  @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session('warnings'))
<div class="alert alert-warning alert-dismissible fade show mb-1" role="alert">
  @foreach (session('warnings') as $warning)
  <div class="my-1"><i class="fa fa-exclamation-triangle"></i> {{ $warning }}</div>
  @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session('events'))
<div class="alert alert-warning alert-dismissible fade show mb-1" role="alert">
  @foreach (session('events') as $event)
  <div class="my-1"><i class="fa fa-exclamation-triangle"></i> {{ $event }}</div>
  @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session('informations'))
<div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
  @foreach (session('informations') as $information)
  <div class="my-1"><i class="fa fa-bullhorn"></i> {{ $information }}</div>
  @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif
