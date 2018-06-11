$(document).ready(function () {
    $('#tablaAsinacionExpedienteusuario').on('click', '.eliminar', function (evst) {
    //		  var target= $(event.target);
      var target= $(this);
      //console.log(target);
      var eliminar = $(this).closest('tr');
      var id_usuarioEliminar = $(this).closest('tr')[0].children[0].getAttribute("id_usuario_eliminar");;
       //console.log("id",id_usuarioEliminar);
       
      var usuarios=$("#usuarios").val().split(",");
      //console.log(usuarios);
      usuarios.splice(usuarios.indexOf(id_usuarioEliminar),1);
      $("#usuarios").val(usuarios.toString());
      $(eliminar).remove();
      $("#project").attr('disabled', false);
      $("#project").val("");
    });
});