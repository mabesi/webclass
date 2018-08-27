<div class="modal-header">
  <h4 class="modal-title">{{ $lesson->title }}</h4>
  <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Fechar</button>
</div>
<div class="modal-body">
  <div class="m-1">
    {!! getYoutubeEmbedLink($lesson->link,'100%') !!}
  </div>
</div>
