<div class="modal-header">
  <h4 class="modal-title">{{ $lesson->title }}</h4>
  <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Fechar</button>
</div>
<div class="modal-body">
  <iframe width="100%" height="420" src="{{ $lesson->link }}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
