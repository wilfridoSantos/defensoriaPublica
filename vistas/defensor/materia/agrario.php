<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 //include_once( '../../controlador/defensor/controladorListaDef.php');

 session_start();
// print_r($_SESSION['personal']);
  $id_personal = $_SESSION['personal'][0]['id_personal'];
  $nombre = $_SESSION['personal'][0]['nombre'];
  //echo $id_personal;
  //echo $nombre;

 
?>
<script >
  var  resultadoConsulta;
  function enviarRespuesta(elemento){
    var respuesta =$(elemento).closest("#rrellenarPregunta").find("#opcionesRespuesta");
    var observacion =$(elemento).closest("#rrellenarPregunta").find("#observacion");
    var accion_implementar =$(elemento).closest("#rrellenarPregunta").find("#observacaccion_implementarion");
    var id_pregunta =$(elemento).closest("#rrellenarPregunta").find("#id_pregunta");
    var id_expediente =$(elemento).closest("#rrellenarPregunta").find("#id_expediente");
   
  
    var sendInfo = {
            id_pregunta        : id_pregunta.val(),
            id_expediente      : id_expediente.val(),
            respuesta          : respuesta.val(),
            observacion        : observacion.val(), 
            accion_implementar : accion_implementar.val(), 
  };
//  console.log("ENVIANDO DATOS DE ABAJO");
  
  //console.log(sendInfo);
  $.ajax({
    type: "POST",
    url: "../../controlador/expediente/seguimientoExpediente.php",
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
                if(json['tipo']==="exito")
                  $("#rrellenarPregunta").children().remove();  
      
    },

    data: sendInfo
});
  
  }

  function eventoPregunta(event,data){
     var seleccionado = event.options[event.selectedIndex];
         console.log(seleccionado);
         
      $("#rrellenarPregunta").children().remove();
      $("#rrellenarPregunta").show();
       $("#registroContraparte").empty();
       
     var tipo= seleccionado.getAttribute('tipo');    
     var typeData="";
     if(tipo==="fecha")//AUNQUE TODO TIENEN EL id opcionesRespuesta SOLO ES UTIL CUANDO ESL TIPO ES select
        typeData=" <input id='opcionesRespuesta'  pattern='[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+' respuesta='valor' type='date' name='respuesta' class='form-control col-md-7 col-xs-12' >";
  
     if(tipo==="select")
        typeData="<select id='opcionesRespuesta' respuesta='valor' required=' ' name='respuesta' class='form-control '></select>";
        
     if(tipo==="texto")
          typeData=" <input id='opcionesRespuesta' pattern='[A-Za-z0-9 éíóúūñÁÉÍÓÚÜÑ]+' respuesta='valor' type='text' name='respuesta' class='form-control col-md-7 col-xs-12' >";  

      var id_expediente= document.getElementById('numExpedienteGlobal').value;  
     $("#rrellenarPregunta").append(
                        '<input id="id_pregunta" type="hidden" name="id_pregunta" value="'+seleccionado.value+'" class="form-control col-md-7 col-xs-12" >'+
                        
                        '<div class="form-horizontal form-label-left">     <div class="form-group">'+
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="respuesta">Respuesta'+
                        '<span class="required">*</span></label>'+
                        '<div  id="idRespuestaCambio" class="col-md-6 col-sm-6 col-xs-12">'+
                          typeData+
                        '<div  class="help-block with-errors"></div></div> </div>  </div>'+

                          '<div class="form-horizontal form-label-left">     <div class="form-group">'+
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Observaciones'+
                          '<span class="required">*</span></label>'+
                        '<div class="col-md-6 col-sm-6 col-xs-12">'+
                        '<textarea id="observacion" name="observacion" pattern="[A-Za-z0-9.,:áéíóú ]+" data-error="solo numeros o letras con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describa las observaciones"></textarea>'+
                          '<div  class="help-block with-errors"></div></div> </div>  </div>'+

                          '<div class="form-horizontal form-label-left">     <div class="form-group">'+//ACCION A IMPLEMENTAR
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Acción a implementar'+
                          '<span class="required">*</span></label>'+
                        '<div class="col-md-6 col-sm-6 col-xs-12">'+
                        '<textarea id="observacaccion_implementarion" name="accion_implementar" pattern="[A-Za-z0-9.,:áéíóú ]+" data-error="solo numeros o letras con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describa la(s) accion que debe realizar "></textarea>'+
                       /* 
                          '<input type="text"  name="accion_implementar"  class="form-control col-md-7 col-xs-12" >'+ */
                          '<div  class="help-block with-errors"></div></div> </div>  </div>'+//FIN DE ACCION A IMPLEMENTAR

                      '<input type="hidden" id="id_expediente"  name="id_expediente"  class="form-control col-md-7 col-xs-12" value='+id_expediente+' >'+// EL ID DE LA PREGUNTA
                       
                     '<div class="form-group">'+
                        '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">'+
						             '<input  type ="button" class="btn btn-succes btn btn-success btn-lg" onclick="enviarRespuesta(this)" value="Registrar "/>'+
                        '</div> </div>'

             );
             //console.log(resultadoConsulta," EN DONDE BUSCAR");
            // console.log(seleccionado.value," QUE BUSCAR");
             
             //console.log(resultadoConsulta[seleccionado.value]);
          
      var opciones=resultadoConsulta[seleccionado.value].opcion;
                 
      if(opciones!=""){               
                  opciones.forEach(function(elemento)  {
                  
                          var opcion=  $('<option value="'+elemento+'" name="opcionpregunta" >  ').text(elemento);
                          $('#opcionesRespuesta').append(opcion);
                    });
        }

         if(seleccionado.value==="324"){           
                  
            $("#idRespuestaCambio").children().remove();
            $('#idRespuestaCambio').append("<select id='opcionesRespuesta'  required=' ' name='respuesta' class='form-control '>"+
                       ' <option value="">- Seleccione -</option> '+
                       ' <option value="AS">AGUASCALIENTES</option>'+
                       ' <option value="BC">BAJA CALIFORNIA</option>'+
                       ' <option value="BS">BAJA CALIFORNIA SUR</option>'+
                       ' <option value="CC">CAMPECHE</option> '+
                       ' <option value="CL">COAHUILA DE ZARAGOZA</option>'+
                       ' <option value="CM">COLIMA</option>'+
                       ' <option value="CS">CHIAPAS</option>'+
                       ' <option value="CH">CHIHUAHUA</option>'+
                       ' <option value="DF">DISTRITO FEDERAL</option>'+
                       ' <option value="DG">DURANGO</option>'+
                       ' <option value="GT">GUANAJUATO</option>'+
                        ' <option value="GR">GUERRERO</option> <option value="HG">HIDALGO</option> <option value="JC">JALISCO</option> <option value="MC">MEXICO</option> <option value="MN">MICHOACAN DE OCAMPO</option> <option value="MS">MORELOS</option> <option value="NT">NAYARIT</option> <option value="NL">NUEVO LEON</option> <option value="OC">OAXACA</option> <option value="PL">PUEBLA</option> <option value="QT">QUERETARO DE ARTEAGA</option> <option value="QR">QUINTANA ROO</option> <option value="SP">SAN LUIS POTOSI</option> <option value="SL">SINALOA</option> <option value="SR">SONORA</option> <option value="TC">TABASCO</option> <option value="TS">TAMAULIPAS</option> <option value="TL">TLAXCALA</option> <option value="VZ">VERACRUZ</option> <option value="YN">YUCATAN</option> <option value="ZS">ZACATECAS</option> <option value="NE">NACIDO EN EL EXTRANJERO</option></select>'+
                            
                                          "</select>");
        } 
        if(tipo==="ignorado"){           
                  
                  $("#idRespuestaCambio").children().remove();
                  $('#idRespuestaCambio').append("<select id='opcionesRespuesta'  required=' ' name='respuesta' class='form-control '>"+
                                                  ' <option value="">- Seleccione -</option> '+
                                                  "</select>");
               
                $.get("../../controlador/juzgado/actividad_juzgado.php?tipo=listadoJuzgadoSeguimiento",function(data){//PARA OBTENER LOS JUZGADO DE OAXACA
                  //console.log(data," los juzgados en seguimiento");
                  var temp="";
                  $.each(data, function (KEY, VALOR) {
                    //console.log("LA REGION ES ",VALOR);
                       temp=' <optgroup label="'+KEY+'">',
                       $.each(VALOR, function (LLAVE, JUZGADO) {
                         temp+= '<option value="'+JUZGADO['nombre']+'">'+JUZGADO['nombre']+'</option> '
                       }); temp+="</optgroup>";
                       
                       $('#opcionesRespuesta').append(temp);
                         })//echo  '</optgroup>';
                });
            
          }
             

            
  }// CIERRE DE LA FUNCION */

  console.log("lista de las preguntas...");
  var user=JSON.parse(window.Global_user_basic);
  var expe=window.num_expedienteGlobal;
        console.log("num de expe ",expe);

  function iniciarPregunta(elemento){
    console.log("dentoro de la preguntas que se tiene que contestar");
    $('#preguntas').empty();
    $("#preguntasAmparo").empty();
  $("#preguntas").hide();
  $("#divInstancia").show();
   var intancia=$(elemento).val();

  console.log(" instancia seleccionada",intancia);
if(intancia!=undefined){
  
  var materia=((intancia==='1')?7 :8);
   
  console.log("materia que se selecciona",materia);

  $('#preguntas').append(
                   '<div id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                           '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > Registrar/Actualizar datos para '+
                           '<span class="required">*</span></label>'+
                           '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                           '<select id="opcionPreguntas" onchange="eventoPregunta(this)" required=""  name="actividad"  class="form-control " >'+
                           ' </select>  </div></div>  </div> '
                          );
                       
  $.get("../../controlador/expediente/lista_preguntas.php?conOpcion=true&id_materia="+materia+"&id_expediente="+expe,function(data){
	      	var jsonMisExp =JSON.parse(data);// jQuery.parseJSON(data);
          resultadoConsulta=jsonMisExp;// guardo el formato json para usarlo posteriomente para crear los input
     
          $("#opcionPreguntas").children().remove();
          $.each(jsonMisExp, function (KEY, VALOR) {
             var varpreguntas=  $('<option value="'+VALOR.id_pregunta_materia+'" name="opcionpregunta" tipo="'+VALOR.identificador+'">  ').text(VALOR.pregunta);
              $('#opcionPreguntas').append(varpreguntas);
        
				   });		
     });
     $("#preguntas").show()
    }//final del if para ver si no esta seleccionado
    
}

//iniciarPregunta();
function registrarAmparo(){
  $("#preguntas").empty();
  $("#preguntasAmparo").empty();
  $("#preguntasAmparo").show();
  $("#divInstancia").hide();
  
  $('#preguntasAmparo').append(
                   '<div id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                           '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > Registrar amparo '+
                           '<span class="required">*</span></label>'+
                           '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                           '<select id="opcionPreguntas" onchange="eventoPregunta(this)" required=""  name="actividad"  class="form-control " >'+
                           ' </select>  </div></div>  </div> '
                          );
 
    $.get("../../controlador/expediente/lista_preguntas.php?conOpcion=true&id_materia=24&id_expediente="+expe,function(data){
     	var jsonMisExp =JSON.parse(data);// jQuery.parseJSON(data);
          resultadoConsulta=jsonMisExp;// guardo el formato json para usarlo posteriomente para crear los input
          //console.log(resultadoConsulta)

        $("#opcionPreguntas").children().remove();;
          $.each(jsonMisExp, function (KEY, VALOR) {
             var varpreguntas=  $('<option value="'+VALOR.id_pregunta_materia+'" name="opcionpregunta" tipo="'+VALOR.identificador+'">  ').text(VALOR.pregunta);
              $('#opcionPreguntas').append(varpreguntas);
        
				   });		        
     });
}
</script>
   
  


<!-- page content -->


            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                         
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-7 invoice-header">
                          <h1>
                              Expediente.
                         </h1>
                        </div>
                        
                        <!-- /.col -->
                      </div>
                      <div class="row invoice-info">
                        <div class="col-sm-12 invoice-col">
                          
                          <address>

                          <ul class="nav nav-pills">
   
                            <li id="agregarContraparte" class="" role="presentation" type="li"><a href="#">Agregar contraparte</a></li>
                              <input style="display:none;"id="numExpedienteGlobal"></input>
                              <input style="display:none;"id="expediente"></input>
                              <li id="visualizarContraparte" role="presentation" class=" " type="li"><a href="#">Visualizar contrapartes</a></li>
                              <li id="respuestasContestadas" role="presentation" class=" " type="li"><a href="#"> Contestadas</a></li>
                              <li id="idSeguimiento" role="presentation" class="active botonContraparte" type="li"> <a href="#">Seguimiento</a></li>
                              <li id="registroAmparo" role="presentation" class=" " type="li" onclick="registrarAmparo()"><a href="#"> Registrar amparo</a></li>
                              <li id="finalizar" role="presentation" class=" " type="li" onclick="verFinalizar()"><a href="#"> Finalizar expediente</a></li>
                          </ul>
                            <!-- <button id="agregarContraparte" type="button">Agregar Contraparte</button>
                                         <input style="display:none;"id="numExpedienteGlobal"></input>
                                         <input style="display:none;"id="expediente"></input>
                             <button id="visualizarContraparte" type="button">Visualizar contrapartes</button>
                             <button id="respuestasContestadas" type="button"> Contestadas</button>
                             <button id="idSeguimiento" type="button"> seguimiento</button>
                            
                             <button id="finalizar" type="button" onclick="verFinalizar()"> Finalizar expediente</button> -->
                            </address>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-xs-12 table">

                         <div id="divInstancia" class="form-horizontal form-label-left">     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="respuesta">Instancia
                         </label>
                          <div  id="idRespuestaCambio" class="col-md-6 col-sm-6 col-xs-12">
                          <select id='agrarioIntancia' onchange="iniciarPregunta(this)" respuesta='valor' required=' ' class='form-control '>
                                            <option value="NINGUNO" >- Seleccione -</option> 
                                            <option value="1">1 Instancia</option> 
                                            <option value="2">2 instancia</option>   
                                             
                          </select>
                          <div  class="help-block with-errors"></div></div> </div>  </div>
                          <div id="preguntasAmparo"><!-- PREGUNTAS PARA AMPARO -->
                            
                            </div>
                          <div id="preguntas"><!-- SE PINTA LAS PREGUNTAS QUE SE TIENE QUE CONTESTAR(RRELLENAR PREGUNTAS) -->
                            
                          </div>
                         <!--  <div id="rrellenarPregunta">
                            
                          </div> -->
                          <!-- <form  id="rrellenarPregunta"  data-toggle="validator"enctype="multipart/form-data" role="form" class="" action ="../../controlador/expediente/seguimientoExpediente.php" object="defensor" method="post">
                           -->
                         

                           <form  id="rrellenarPregunta"  data-toggle="validator" enctype="multipart/form-data" role="form" class=""  object="pregunta">
                           
                          </form> 
                          
                        </div>
                        <!-- /.col -->
                        <div id="registroContraparte">
                       
                       </div>
                      </div>
                      
                      <!-- VISUALIZAR LOS USUARIOS DE CONTRAPARTE -->

                <div class="modal fade" id="modalContraparte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Usuario(s)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div id="miUsuarioContraparte" class="table-responsive x_content" title="infomación">
                                  <!--  <table id="exampleuser" lass="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  --> <table id="verContraparte" class="table  dt-responsive ui table" cellspacing="0" width="100%">
                                    
                                            <thead>
                                                <tr > 
                                                <th >    Nombre    </th>
                                                <th >     Apellido paterno </th>
                                                <th >     Apellido Materno </th>
                                                <th >    Idioma/lengua     </th>
                                                <th >    Etnia     </th></tr>
                                                </thead>
                                              <tbody id="datosUsuarioServicio">
                                                
                                              </tbody>
                                            </table>

                                          </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                    </div> <!-- FIN DE LO OTRO INIICIO PARA EDITAR CONTRAPARTE -->

                     <div class="modal fade" id="modalEditarContraparte" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Usuario(s)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div id="miEditarUsuarioContraparte" class="table-responsive x_content" title="infomación">
                                  <!--  <table id="exampleuser" lass="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  --> 
                                    <div  id="EditarUsuarioContraparte">
                                      
                                    </div>
                                    
                                          </div>
                                          <form id="EditarContraparte" data-toggle="validator" role="form" class="example_form form-horizontal form-label-left"
                                            enctype="multipart/form-data" object="defensor">
                                        
                                        </form>
                                          <div  id="EditarContraparte">
                                      
                                      </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                    </div> 


                     <!-- FIN DE LO OTRO INIICIO PARA ver finalizar expediente -->

                     <div class="modal fade" id="modalFinalExpediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Finalizar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div id="miFinalizar" class="table-responsive x_content" title="infomación">
                                  <!--  <table id="exampleuser" lass="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  --> 
                                    <div  id="EditarUsuarioContraparte">
                                      
                                    </div>
                                    
                                          </div>
                                          <form id="FinalizarExpedinte" data-toggle="validator" role="form" class="example_form form-horizontal form-label-left"
                                            enctype="multipart/form-data" object="defensor">
                                        

                                              <div class="form-group"> 
                                              <label  class="control-label col-md-3 col-sm-3 col-xs-4">Fecha de finalización<span class="required"></span></label> 
                                              <div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback"> 
                                              <input  type="date" class="form-control " id="fecha_final" placeholder="Id personal" name="nombre"> 
                                             
                                              <span class ="help-block"> <span	> 
                                              </div> 
                                              </div>  

                                               <div class="form-group"> 
                                              <label  class="control-label col-md-3 col-sm-3 col-xs-4">observación<span class="required"></span></label> 
                                              <div  class="col-md-6 col-sm-6 col-xs-12  form-group has-feedback"> 
                                              <textarea  id="observacionFinal" name="accion_implementar" pattern="[A-Za-z0-9.,:áéíóú ]+" data-error="solo numeros o letras con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describa la(s) accion que debe realizar "></textarea>
                     
                                              <span class ="help-block"> <span	> 
                                              </div> 
                                              </div> 


                                              <div class="form-group"> 
                                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3"> 
                                                  <input class="btn btn-succes btn btn-success btn-lg" type="button" name="botonUpdate" onclick="finalizarExpedinte()" id="botonUpdate" value="finalizar"></input>  
                                                  </div> 
                                                  </div>
                                        </form>
                                          
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                    </div> 
                          <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                         -->      
                   
                    </section>
                  </div>
                </div>
              </div>
            </div>
         


    

<!-- <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script> -->
  <!--   <script src="../../recursos/js/custom.min.js"></script> -->
    <script src="../../recursos/js/curp.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>
    <script src="../../recursos/js/defensor/atendiendoExpediente.js"></script>
    <script src="../../recursos/js/expediente/gestionContraparte.js"></script>
    
    <script src="../../recursos/js/select2.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>


    <script>

$('#myform').validator()
$('#myubicacion').hide()
$('#personal').hide()
$('#mycomprobante').hide()
//$("#idSeguimiento").hide()
$("#preguntas").hide()
$('#resultado').keyup(validateTextarea);

function validateTextarea() {
    var errorMsg = "Please match the format requested.";
    var textarea = this;
    var pattern = new RegExp('^' + $(textarea).attr('pattern') + '$');
    // check each line of text
    $.each($(this).val().split("\n"), function () {
        // check if the line matches the pattern
        var hasError = !this.match(pattern);
        if (typeof textarea.setCustomValidity === 'function') {
            textarea.setCustomValidity(hasError ? errorMsg : '');
        } else {
            // Not supported by the browser, fallback to manual error display...
            $(textarea).toggleClass('error', !!hasError);
            $(textarea).toggleClass('ok', !hasError);
            if (hasError) {
                $(textarea).attr('title', errorMsg);
            } else {
                $(textarea).removeAttr('title');
            }
        }
        return !hasError;
    });
}
</script>