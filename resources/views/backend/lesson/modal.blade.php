<script type="text/javascript">
  function confirmLink(){
    return confirm("Deseja marcar a aula como assistida?");
  }
</script>

<div class="modal-header">
  <h4 class="modal-title">{{ $lesson->title }}</h4>
  <span class="float-right">
    @if ($lesson->completed())
      <span class='badge badge-success font-sm'>Assistida</span>
    @elseif (isNotAdmin())
      <a href="{{ url('lesson/'.$lesson->id.'/watched') }}" title="Clique para marcar a aula como Assistida"
        class="btn btn-primary btn-sm" onclick="return confirmLink()">Finalizar Aula</a>
    @endif
    <button type="button" class="btn btn-secondary btn-sm ml-2" data-dismiss="modal">Fechar</button>
  </span>
</div>
<div class="modal-body">
  <div class="m-1">
    {!! getYoutubeEmbedLink($lesson->link,'100%') !!}
  </div>
</div>
