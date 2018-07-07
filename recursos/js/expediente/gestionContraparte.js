function verFinalizar(){

    $("#modalFinalExpediente").modal('show');
}
function finalizarExpedinte(){
   console.log("hola finalizar");
   $("[class='active botonContraparte']").removeClass( "active botonContraparte" );
   $(this).addClass( "active botonContraparte" );
console.log("fdao ", document.getElementById('observacionFinal'));

   var sendInfo = {
       id_expediente:document.getElementById("numExpedienteGlobal").value,
    fecha_final   : document.getElementById('fecha_final').value,
    observacion           : document.getElementById('observacionFinal').value,
    
    
};

$.ajax({
type: "POST",
url: "../../controlador/expediente/finalizarExpediente.php",
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
      $("#modalFinalExpediente").modal('hide');
        if(json['tipo']==="exito")
          $("#registroContraparte").children().remove();  

},

data: sendInfo
});
  // $("#modalFinalExpediente").modal('hide');
}




var visualizar=document.getElementById("visualizarContraparte")
visualizar.addEventListener('click',verUsuarioContraparte,false);

function EnviarActualizacion(){
   

     var sendInfo = {
      id_contraparte   : document.getElementById('id_contraparteEnviar').value,
      nombre           : document.getElementById('nombre').value,
      apellido_paterno : document.getElementById('ap').value,
      apellido_materno : document.getElementById('am').value,
      etnia            : document.getElementById('etnia').value,
      idioma           : document.getElementById('idioma').value,
      telefono         : document.getElementById('telefono').value,
      genero           : document.getElementById('genero').value,
      discapacidad     : document.getElementById('discapacidad').value,
      email            : document.getElementById('email').value
      
};

$.ajax({
type: "POST",
url: "../../controlador/expediente/actualizarContraparte.php",
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
        $("#modalEditarContraparte").modal('hide');
        $("#modalContraparte").modal('hide');
          if(json['tipo']==="exito")
            $("#registroContraparte").children().remove();  

},

data: sendInfo
});
    
}
function editarContraparte(elemento){
       console.log("dentro del elemento ",elemento);
          var id_contrparteEditar=elemento.getAttribute('idcontraparte');
      
console.log(id_contrparteEditar," id del contraparte");

        $.ajax({
        url: "../../controlador/expediente/obtenerContraparte.php",
        type: "GET",
        data: "id_contraparte="+id_contrparteEditar,
        beforeSend:function(){
          
          $('#modalEditarContraparte').modal('show');
          
        },	
        success: function (data) {
            console.log(data);
            var json=jQuery.parseJSON(data)[0]
            console.log(json);
            
            $("#EditarContraparte").children().remove();
          
           
                $('#EditarContraparte').append(
                  '<div class="form-group">' +
                  '<label style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-4"><span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="hidden" class="form-control " id="id_contraparteEnviar" placeholder="Id personal" name="id_contraparte"' +
                  'value="' + json.id_contraparte + '" readonly>' +
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
                  'value="' + json.apellido_paterno + '" >' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' + 

                  '<div class="form-group">' +
                  '<label  class="control-label col-md-3 col-sm-3 col-xs-4">Apellido materno<span class="required"></span></label>' +
                  '<div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback">' +
                  '<input  type="text" class="form-control " id="am" placeholder="apellido" name="am"' +
                  'value="' + json.apellido_materno + '" >' +
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
                  'value="' + json.email + '"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$">' +
                  '<span class ="help-block"> <span	>' +
                  '</div>' +
                  '</div>' +                                                 
                  '<div class="form-group">' +
                  '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">' +
                  '<input class="btn btn-succes btn btn-success btn-lg" type="button" name="botonUpdate" onclick="EnviarActualizacion()" id="botonUpdate" ' +
                  'value="Actualizar Datos"></input> ' +
                  '</div>' +
                  '</div>'
              );
             
            
          },complete:function(){
          $('#modalEditarContraparte').modal('show');
          
        
        }
          
        }); 
                    
} //FINAL DEL MENTO PAARA ACTUALIZAR
  function verUsuarioContraparte(){
    $("[class='active botonContraparte']").removeClass( "active botonContraparte" );
		$(this).addClass( "active botonContraparte" );
   var idexpedienteVer=document.getElementById("numExpedienteGlobal").value;
     console.log("numer ex ", idexpedienteVer);

        $.ajax({
        url: "../../controlador/expediente/listarCompletaContraparte.php",
        type: "GET",
        data: "id_expediente="+idexpedienteVer,
        beforeSend:function(){
            
            
        },	
        success: function (data) {
            //console.log(data);
            
                var json=jQuery.parseJSON(data)
                $("#verContraparte").children().remove();
        
                $.each(json,function(key, valor) {
                        $('#verContraparte').append(
                        '<tr><td>'+valor.nombre+'</td>'+
                        '<td>'+valor.apellido_paterno+'</td>'+
                        '<td>'+valor.apellido_materno+'</td>'+
                        '<td>'+valor.idioma+'</td>'+                                                    
                        '<td>'+valor.etnia+'</td>'+
            '<td><button type="button" class="btn btn-primary" onclick="editarContraparte(this)" idContraparte="'+valor.id_contraparte+'" id="id_contraparte" name="idContraparte">Editar</button></td>'+
            '</tr>'                                                    
                        
                    );
                }); 
                
            },complete:function(){
            $('#modalContraparte').modal('show');
            
  
  }
     
  }); 

}