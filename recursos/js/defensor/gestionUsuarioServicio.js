
function EnviarActualizacionUsuarioServicio(){
   

     var sendInfo = {
      id_usuario_servicio   : document.getElementById('id_usuario_servicioEnviar').value,
      nombre           : document.getElementById('nombre').value,
      apellido_paterno  : document.getElementById('ap').value,
      apellido_materno : document.getElementById('am').value,
      telefono         : document.getElementById('telefono').value,
      email            : document.getElementById('email').value,
      calle            : document.getElementById('calle').value,
      municipio        : document.getElementById('municipio').value,
      colonia          : document.getElementById('colonia').value,
      etnia            : document.getElementById('etnia').value,
      idioma           : document.getElementById('idioma').value,
      genero           : document.getElementById('genero').value,
      numero           : document.getElementById('numero').value,
      discapacidad     : document.getElementById('discapacidad').value,
      
};

$.ajax({
type: "POST",
url: "../../controlador/usuario_servicio/actualizarUsuario.php",
dataType: "html",
success: function (data) {
console.log(data);

var json=jQuery.parseJSON(data)
  
  console.log($("#idMensaje"));
      var alert="";

        if(json['tipo']==="exito")
           alert="alert alert-success";

        //$alert='alert alert-danger';
         if(json['tipo']==="error")
           alert="alert alert-danger";

          if(json['tipo']==="juzgado")
            alert="alert alert-danger";
            
           $("#contenedorMensaje").attr("class",""+alert);
  

          $("#contenedorMensaje").append('<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'+
          '<div class="modal-dialog modal-dialog-centered" role="document">'+
              '<div class="modal-content">'+
              '<strong align="center" id="id_Mensaje" class="alert-dismissible fade in '+alert+'"></strong>'+
              
              '<div class="modal-footer">'+
              ' <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>'+
              '</div></div> </div></div>');
              $("#id_Mensaje").text(json['mensaje']);
              console.log(json['mensaje']," fue esto");
              
              $('#exampleModalLong').modal('show');
              console.log("ffef en always ",json['tipo']);
        $("#modalEditarUsuarioServicio").modal('hide');
        $("#mostrarusuarioServicio").modal('hide');
          if(json['tipo']==="exito")
            $("#EditarUsuarioServicio").children().remove();  

},

data: sendInfo
});
    
}
function editarUsuarioServicio(elemento){
       console.log("dentro del elemento ",elemento);
          var id_usuarioServicioEditar=elemento.getAttribute('id_usuario_servicio');
      
console.log(id_usuarioServicioEditar,"  del id_usuarioServicioEditar");

        $.ajax({
        url: "../../controlador/usuario_servicio//listaUsuario.php",
        type: "GET",
        data: "id_usuario_servicio=true&id_usuario_servicio="+id_usuarioServicioEditar,
        beforeSend:function(){
          
          $('#modalEditarUsuarioServicio').modal('show');
          
        },	
        success: function (data) {
            console.log(data);
            var json=jQuery.parseJSON(data)[0]
            console.log(json);
            
            $("#EditarUsuarioServicio").children().remove();
          
           
                $('#EditarUsuarioServicio').append(
                  '<div class="form-group">' +
                  '<label style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="hidden" class="form-control " id="id_usuario_servicioEnviar" placeholder="Id personal" name="id_contraparte"' +
                  'value="' + json.id_usuario_servicio + '" readonly>' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 
                 

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Nombre<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="nombre" placeholder="Id personal" name="nombre"' +
                  'value="' + json.nombre + '">' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Apellido paterno<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="ap" placeholder="apellido" name="ap"' +
                  'value="' + json.ap_paterno + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Apellido materno<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="am" placeholder="apellido" name="am"' +
                  'value="' + json.ap_materno + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>'+

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Municipio<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="municipio" placeholder="apellido" name="am"' +
                  'value="' + json.municipio + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>'+

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Colonia<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="colonia" placeholder="apellido" name="am"' +
                  'value="' + json.colonia + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>'+
                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Calle<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="calle" placeholder="apellido" name="am"' +
                  'value="' + json.calle + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>'+

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Numero<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="numero" placeholder="apellido" name="am"' +
                  'value="' + json.numero_ext + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>'+
                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Etnia<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="etnia" placeholder="Etnia" name="ap"' +
                  'value="' + json.etnia + '"  pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Lengua/idioma<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="idioma" placeholder="Idioma/etnia" name="ap"' +
                  'value="' + json.idioma + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 
                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Telefono<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="telefono" placeholder="Telefono" name="ap"' +
                  'value="' + json.telefono + '" pattern="([0-9]{13})|([0-9]{10})">' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' +  
                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Genero<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="genero" placeholder="Genero" name="ap"' +
                  'value="' + json.genero + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' +   
                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Discapacidad<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="discapacidad" placeholder="Discapacidad" name="ap"' +
                  'value="' + json.discapacidad + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' +  

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Email<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="email" placeholder="Email" name="ap" ' +
                  'value="' + json.correo_electronico + '"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$">' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' +                                                 
                  '<div class="form-group">' +
                  '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">' +
                  '<input class="btn btn-succes btn btn-success btn-lg" type="button" name="botonUpdate" onclick="EnviarActualizacionUsuarioServicio()" id="botonUpdate" ' +
                  'value="Actualizar Datos"></input> ' +
                  '</div>' +
                  '</div>'
              );
             
            
          },complete:function(){
          $('#modalEditarUsuarioServicio').modal('show');
          
        
        }
          
        }); 
                    
}