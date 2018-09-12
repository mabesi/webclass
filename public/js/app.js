$( document ).ready(function() {

  $(".delete-button").on("click", function() {
    return deleteItem(this);
  });

  $(".confirm-link").on("click", function() {
    return confirmAction(this);
  });

  $(".confirm-submition").submit(function() {
    return confirmAction(this);
  });

  $("#largeModal").on("show.bs.modal", function(e) {
      var link = $(e.relatedTarget).data('target-id');
      $.get(link, function (data) {
          $(".modal-content").html(data);
      });
  });

}); //End document.ready

function confirmAction(e) {
  var msg = $(e).data('message');
  var message = msg.replace(/\\n/g,'\n');
  return confirm(message);
}

function deleteItem(e) {

      var token = $(e).data('token');
      var resource = ($(e).data('resource') == 'True');
      var previous = $(e).data('previous');
      var url = $(e).attr('href');

      if (confirm('Confirma a exclusão deste item?')==true){
        $.ajax({
          type: "post",
          url: url,
          data: {_method: 'delete',_token: token}
        })
        .done(function(response){
          console.log(response.msg);
            if (response.success){
              alert(response.msg);
              if (resource){
                $(location).attr('href',previous);
              } else {
                location.reload();
              }
            } else {
              console.log("Erro ao deletar.");
              alert(response.msg);
            }
        })
        .fail(function(jqXHR, textStatus, msg){
          alert('Falha ao tentar deletar o recurso: '+msg);
        });
      }
      return false;
}
