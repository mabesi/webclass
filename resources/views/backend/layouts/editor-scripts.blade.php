<script src="{{ asset('summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('summernote/lang/summernote-pt-BR.js') }}"></script>
<script>
  $(document).ready(function () {

    var toolbar = [
      ['screen', ['fullscreen','codeview']],
      ['history', ['undo', 'redo']],
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['color', ['color']],
      ['para', ['paragraph','ul', 'ol','table','hr']],
      ['media', ['link','picture','video']],
      ['help', ['help']],
    ];

    $('textarea.summernote-small').summernote({
      minHeight: 100,
      lang: 'pt-BR',
      toolbar: toolbar
    });
    $('textarea.summernote').summernote({
      minHeight: 220,
      lang: 'pt-BR',
      toolbar: toolbar
    });
    $('textarea.summernote-large').summernote({
      minHeight: 300,
      lang: 'pt-BR',
      toolbar: toolbar
    });
  });
</script>
