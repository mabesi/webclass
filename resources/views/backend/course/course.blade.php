@extends('backend.layouts.panel')

@section('content')

<div class="card">
  <div class="card-header">
    @if (isAdmin())
    <span class="float-right">
      <a href="{{ url('course/'.$course->id.'/unity/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Unidade</a>
      <a href="{{ url('course/'.$course->id.'/courseware/create') }}" class="btn btn-primary btn-sm mr-1" >Incluir Arquivo</a>
      {!! getItemAdminIcons($course,'course','True') !!}
      {!! getStatusBadge($course->status,'font-2xl') !!}
    </span>
    @elseif(!$course->registered(getUserId()))
    <span class="float-right">
      <a href="{{ url('course/'.$course->id.'/register') }}" class="btn btn-primary btn-lg confirm-link"
         data-message="Confirma a inscrição no curso?">Inscreva-se</a>
    </span>
    @endif
    <h1>
      <i class="fa fa-dot-circle-o"></i> {{ $course->title }} {!! getCourseStarIcon($course,True,'warning') !!}
    </h1>
  </div>

  <div class="card-body">

    <div class="row">
      <div class="col-sm-12">
        <p class="text-justify">{{ $course->description }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        Categoria: <a href="{{ url('category/'.$course->category_id) }}">{{ $course->category->name }}</a>
      </div>
      <div class="col-sm-4">
        Instrutor: <a href="{{ url('instructor/'.$course->instructor_id) }}">{{ $course->instructor->name }}</a>
      </div>
      <div class="col-sm-5">
        Palavras-chave:{!! getKeywordsLinks($course->keywords) !!}
      </div>
    </div>


  </div>
</div>

@if($course->registered(getUserId()) && $progress>0)
<div class="card">

  <div class="card-body">
    <div class="row">
      <div class="col-sm-4">
        <h4 class="bg-light p-2">Progresso de Estudos</h4>
        <div class="progress my-2 progress-30">
          <div class="progress-bar bg-{{ $progress>=50?($progress==100?'green':'blue'):($progress<25?'red':'warning') }}" role="progressbar" style="width: {{ $progress }}%;"
           aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"><b>{{ $progress }}%</b>
          </div>
        </div>
        <div class="font-weight-bold text-center mt-3">
          @if ($progress==100)
            {!! getGradeBadge($average,'Média Final:','text-white p-2 font-xl mb-2') !!}
            @if ($average>=70)
            <br>
            <a href="{{ url('course/'.$course->id.'/certificate') }}" target="_blank" class="btn btn-primary">Meu Certificado</a>
            @endif
          @else
            <p class="text-muted mt-3">
              {{ getRandMessage() }}
            </p>
          @endif
        </div>
      </div>
      <div class="col-sm-8">
        @if ($userRating!=Null)

        <h4 class="bg-light p-2">Sua Avaliação do Curso</h4>
        <div class="list-group">
          <div class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{!! getStars($userRating->rate) !!}</h5>
              <small class="text-muted">{{ humanPastTime($userRating->created_at) }}</small>
            </div>
            <p class="mb-1">{{ $userRating->comment }}</p>
          </div>
        </div>

        @else

        <h4 class="bg-light p-2">Avaliação do Curso</h4>

        <form action="{{ url('rating') }}" method="POST" >

          {{ csrf_field() }}
          <input type="hidden" name="course_id" value="{{ $course->id }}">

          <div class="row">

            <div class="col-sm-8">
              <div class="form-group">
                <label for="comment">Comentário</label>
                <textarea class="form-control" id="comment" rows="3" name="comment" required/></textarea>
              </div>
            </div>

            <div class="col-sm-4">

              <div class="form-group">

                <label>Classificação</label>

                <div class="stars">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="star0" value="" name="rate" type="radio" checked>
                    <label class="form-check-label" for="star1"><i class="fa"></i></label>
                    <input class="form-check-input" id="star1" value="1" name="rate" type="radio" >
                    <label class="form-check-label" for="star2"><i class="fa"></i></label>
                    <input class="form-check-input" id="star2" value="2" name="rate" type="radio" >
                    <label class="form-check-label" for="star3"><i class="fa"></i></label>
                    <input class="form-check-input" id="star3" value="3" name="rate" type="radio" >
                    <label class="form-check-label" for="star4"><i class="fa"></i></label>
                    <input class="form-check-input" id="star4" value="4" name="rate" type="radio" >
                    <label class="form-check-label" for="star5"><i class="fa"></i></label>
                    <input class="form-check-input" id="star5" value="5" name="rate" type="radio" >
                  </div>
                </div>

              </div>

              <button type="submit" class="btn btn-primary form-control">Enviar</button>

            </div>

          </div>
        </form>
        @endif

      </div>
    </div>

  </div>

</div>
@endif

@if($course->registered(getUserId()) || isAdmin())
<div class="card mt-3">
  <div class="bg-light card-header">
    <h2>Conteúdo do Curso</h2>
  </div>
  <div class="card-body">

    <div class="row">

      <div class="col-sm-7">
        <h3 class="p-2 bg-light"><i class="fa fa-list"></i> Unidades</h3>
        <ul class="list-group">
          @foreach ($course->unities()->orderBy('sequence')->get() as $unity)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center {{ $unity->progress()==100?'bg-gray-200':'' }}">
            <span>
              <span class="font-xl">
                <b>{{ $unity->sequence }}</b> -
                <a href="{{ url('unity/'.$unity->id) }}">{{ $unity->title }}</a>
                @if ($unity->progress()==100)
                <i class="fa fa-check text-success"></i>
                @endif
              </span>

              @if (isset($unity->examination->id))
              <br>
              <small>

                @if ($unity->examination->grade(getUserId())!=Null)
                <i class="fa fa-check text-success"></i> Exame {{ $unity->examination->sequence }}
                {!! getGradeBadge($unity->examination->grade(getUserId()),'Nota:','text-white font-xs') !!}
                <a href="{{ url('examination/'.$unity->examination->id.'/verification') }}" class="" >Verificar Respostas</a>
                @else
                 <a href="{{ url('examination/'.$unity->examination->id) }}" ><i class="fa fa-caret-right ml-2"></i> Exame {{ $unity->examination->sequence }}</a>
                 @endif
               </small>
              @endif
            </span>
            <span>{!! getItemAdminIcons($unity,'unity','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="col-sm-5">
        <h3 class="p-2 bg-light"><i class="fa fa-folder-open"></i> Material Didático</h3>
        <ul class="list-group">
          @foreach ($course->coursewares as $courseware)
          <li class="list-group-item d-flex list-group-item-action justify-content-between align-items-center">
            <span>
              {!! getFileIcon($courseware->name) !!} <a href="{{ url('courseware/'.$courseware->id) }}">{{ $courseware->title }}</a><br>
              <small>{{ getDownloadName($courseware->name) }}</small>
            </span>
            <span>{!! getItemAdminIcons($courseware,'courseware','False') !!}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endif

@endsection

@push('scripts')
@endpush
