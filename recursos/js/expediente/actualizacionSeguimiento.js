console.log("lista de las preguntas");
$("#rrellenarPregunta").hide();
var preguntasSeguimiento="";// GUARDO EL RESULTADO QUE ME REGRESA EL AJAX EN LA PETICION DE LAS PREGUNTAS PAR OCUPARLA EN DETALLE
function mostrarRespuestaPregunta(elemento){
//console.log(elemento);
 $('.divRespuestas').hide();
 var elem =$(elemento).closest("#contenedor").children("#divRespuestas");
      
 
     if($('.divRespuestas').is(':hidden')){
        $(elem).show();
      }else{
       $(elem).hide(); // Acción si el elemento es visible
           }
       
 //var id_expediente = $(this).closest('tr').find('#id_expediente').text();
}

function enviarActualizacion(elemento){
   var respuesta =$(elemento).closest("#contenedor").children("#divRespuestas").find("#respuestaPregunta");
   var observacion =$(elemento).closest("#contenedor").children("#divRespuestas").find("#observacionPregunta");
   var accion_implementar =$(elemento).closest("#contenedor").children("#divRespuestas").find("#accion_implementarPregunta");
   var id_respuesta =$(elemento).closest("#contenedor").children("#divRespuestas");
   
      var sendInfo = {
           id_respuesta        : id_respuesta.attr('idrespuesta'),
           respuesta           : respuesta.val(),
           observacion         : observacion.val(),
           accion_implementar  : accion_implementar.val(),
   };
   
   $.ajax({
   type: "POST",
   url: "../../controlador/expediente/actualizarRespuestaPregunta.php",
   dataType: "html",
   success: function (data) {
       var json=jQuery.parseJSON(data)
       console.log(data);
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
      $(".divRespuestas").hide();
               if(json['tipo']==="exito")
                 $("#registroContraparte").children().remove();  
     
   },

   data: sendInfo
});
}
 $.get("../../controlador/expediente/respuestaPregunta.php?id_expediente="+document.getElementById("numExpedienteGlobal").value,function(data){
   console.log(data);      
   var jsonMisExp =JSON.parse(data);// jQuery.parseJSON(data);
         resultadoConsulta=jsonMisExp;// guardo el formato json para usarlo posteriomente para crear los input
           
       preguntasSeguimiento=jsonMisExp;
       //  console.log(jsonMisExp);
         $('#respuestaPregunta').empty();
         
         var numExpedente= document.getElementById('expediente');
         console.log("el expediente es: ",numExpedente);
         
         $('#detalleExpediente').text(numExpedente.innerText);
         $.each(jsonMisExp, function (KEY, VALOR) {
            //var varpreguntas=  $('<option value="'+VALOR.id_pregunta+'" name="opcionpregunta" tipo="'+VALOR.identificador+'">  ').text(VALOR.pregunta);
             $('#respuestaPregunta').append('<div id="contenedor">'+//ESTE DIV EL CONTENEDOR PADRE
                       '<div id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                          '<h4> <label for="inputEmail" class="control-label col-md-7 col-sm-3 col-xs-12 " >'+ VALOR.pregunta+
                          '<span class="glyphicon glyphicon-eye-close" onclick="mostrarRespuestaPregunta(this)"></span></label>'+
                          '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                           '</div></div>  </div> '+

                           '<div id="divRespuestas" class="divRespuestas" style="display:none;" idrespuesta="'+VALOR.id_respuesta+'">'+  //ESTE DIV ES EL CONTENEDOR PARA LAS RESPUESTAS  
                                   '<div id="actividadRespuesta" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                     '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > respuesta'+ 
                                     '<span class="required">*</span></label>'+
                                     '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                     '<input id="respuestaPregunta"  pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+" idrespuesta="'+VALOR.id_respuesta+'" required=""  name="respuestaPregunta"  class="form-control " value="'+VALOR.respuesta+'">'+
                                   ' </input>  </div></div>  </div> '+

                                   '<div id="actividadObservaciones" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                    '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > Observaciones'+
                                    '<span class="required">*</span></label>'+
                                    '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                    '<textarea id="observacionPregunta" pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+"  novalidate minlength="10" maxlength="250"   name="observacionPregunta"  class="form-control " >'+VALOR.observaciones+
                                   ' </textarea>  </div></div>  </div> ' +

                                   '<div id="actividadAccion_implementar" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                    '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " >Accion a tomar'+
                                    '<span class="required">*</span></label>'+
                                    '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                    '<textarea id="accion_implementarPregunta" pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+"  minlength="10" maxlength="250" novalidate  name="accion_implementarPregunta"  class="form-control " >'+VALOR.accion_implementar+
                                   ' </textarea>  </div></div>  </div> ' +

                          '<div class="form-group">'+//boton enviar
                       '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">'+
                                    '<input id="boton" type ="button" class="btn btn-succes btn btn-success btn-lg" onclick="enviarActualizacion(this)" value="Registrar "/>'+
                       '</div> </div>'+

                          '</div>'+//CIERRE EL DIV DE LAS RESPUETAS      
                          '</div>'//CIERRE DEL CONTENEDOR PADRE
                       );
       
                  });
                     
    });
   
    function print_specific_div_content(){
        var content = "<html>";
        content += document.getElementById("detalladoSeguimiento").innerHTML ;
        content += "</body>";
        content += "</html>";
    
        var printWin = window.open('','','left=0,top=0,width=552,height=477,toolbar=0,scrollbars=0,status =0');
        printWin.document.write(content);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
    }
function modolSeguimiento(){
    console.log("PREGUNTAS DETALLADAS");
    
  //  console.log(preguntasSeguimiento);
    $.each(preguntasSeguimiento, function (KEY, VALOR) {
        //var varpreguntas=  $('<option value="'+VALOR.id_pregunta+'" name="opcionpregunta" tipo="'+VALOR.identificador+'">  ').text(VALOR.pregunta);
         $('#detalladoSeguimiento').append('<div id="contenedor">'+//ESTE DIV EL CONTENEDOR PADRE
                   '<div id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                      '<h4> <label for="inputEmail" class="control-label col-md-7 col-sm-3 col-xs-12 " >'+ VALOR.pregunta+
                      '<span class="" onclick="mostrarRespuestaPregunta(this)"></span></label>'+
                      '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                       '</div></div>  </div> '+

                       '<div id="detalleRespuesta" class="divRespuestas"  idrespuesta="'+VALOR.id_respuesta+'">'+  //ESTE DIV ES EL CONTENEDOR PARA LAS RESPUESTAS  
                               '<div id="actividadRespuesta" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                 '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > respuesta'+ 
                                 '</label>'+
                                 '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                 '<input id="respuestaPregunta"  pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+" idrespuesta="'+VALOR.id_respuesta+'" required=""  name="respuestaPregunta"  class="form-control " value="'+VALOR.respuesta+'">'+
                               ' </input>  </div></div>  </div> '+

                               '<div id="detalleObservacion" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > Observaciones'+
                                '</label>'+
                                '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                '<textarea id="observacionPregunta" pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+"  novalidate minlength="10" maxlength="250"   name="observacionPregunta"  class="form-control " >'+VALOR.observaciones+
                               ' </textarea>  </div></div>  </div> ' +

                               '<div id="detalleAccionImplemnetar" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                                '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " >Accion a tomar'+
                                '</label>'+
                                '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                                '<textarea id="accion_implementarPregunta" pattern="[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+"  minlength="10" maxlength="250" novalidate  name="accion_implementarPregunta"  class="form-control " >'+VALOR.accion_implementar+
                               ' </textarea>  </div></div>  </div> ' +

                     

                      '</div>'+//CIERRE EL DIV DE LAS RESPUETAS      
                      '</div>'//CIERRE DEL CONTENEDOR PADRE
                   );
   
              });$('#botonImprimir').append( '<div class="form-group">'+//boton enviar
              '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">'+
                           '<input id="boton" type ="button" class="btn btn-succes btn btn-success btn-lg" onclick="print_specific_div_content()" value="imprimir "/>'+
              '</div> </div>');

    $('#modalDetalladoExpediente').modal('show');
}