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
  function eventoPregunta(event,data){
     var seleccionado = event.options[event.selectedIndex];
      $("#rrellenarPregunta").children().remove();

     var tipo= seleccionado.getAttribute('tipo');
         
     var typeData="";
     if(tipo==="fecha")
        typeData=" <input type='date' name='respuesta' class='form-control col-md-7 col-xs-12' >";
  
     if(tipo==="select")
        typeData="<select id='opcionesRespuesta'  required='  name='respuesta' class='form-control '></select>";
          
        
        
    if(tipo==="texto")
          typeData=" <input type='text' name='respuesta' class='form-control col-md-7 col-xs-12' >";   
        
     $("#rrellenarPregunta").append(
                        '<input type="hidden" name="id_pregunta" value="'+seleccionado.value+'" class="form-control col-md-7 col-xs-12" >'+
                        
                        '<div class="form-horizontal form-label-left">     <div class="form-group">'+
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="respuesta">Respuesta'+
                          '<span class="required">*</span></label>'+
                        '<div class="col-md-6 col-sm-6 col-xs-12">'+
                          typeData+
                          '<div  class="help-block with-errors"></div></div> </div>  </div>'+

                          '<div class="form-horizontal form-label-left">     <div class="form-group">'+
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Observaciones'+
                          '<span class="required">*</span></label>'+
                        '<div class="col-md-6 col-sm-6 col-xs-12">'+
                        '<textarea id="observacion" name="observacion" pattern="[A-Za-z0-9.,:áéíóú ]+" data-error="solo numeros o letras con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describa las observaciones"></textarea>'+
                          '<div  class="help-block with-errors"></div></div> </div>  </div>'+

                          '<div class="form-horizontal form-label-left">     <div class="form-group">'+
                        '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Accion a tomar'+
                          '<span class="required">*</span></label>'+
                        '<div class="col-md-6 col-sm-6 col-xs-12">'+
                        '<textarea id="observacaccion_implementarion" name="accion_implementar" pattern="[A-Za-z0-9.,:áéíóú ]+" data-error="solo numeros o letras con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describa la(s) accion que debe realizar "></textarea>'+
                       /* 
                          '<input type="text"  name="accion_implementar"  class="form-control col-md-7 col-xs-12" >'+ */
                          '<div  class="help-block with-errors"></div></div> </div>  </div>'+

                           '<div class="form-group">'+
                        '<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">'+
						             '<input  type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Registrar Actividad"/>'+
                        '</div> </div>'

             );
      var opciones=resultadoConsulta[seleccionado.value].opcion;
                 
      if(opciones!=""){           
                  opciones.forEach(function(elemento)  {
                          var opcion=  $('<option value="'+elemento+'" name="opcionpregunta" >  ').text(elemento);
                          $('#opcionesRespuesta').append(opcion);
                    });
        }
            
  }
  console.log("lista de las preguntas");
  $('#preguntas').append(
                   '<div id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">'+
                           '<h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " > Actualizar datos para '+
                             '<span class="required">*</span></label>'+
                            '</h4><div class="col-md-6   col-sm-6 col-xs-12">'+
                            '<select id="opcionPreguntas" onchange="eventoPregunta(this)" required=""  name="actividad"  class="form-control " >'+
                            ' </select>  </div></div>  </div> '
                          );
  $.get("../../controlador/expediente/lista_preguntas.php?conOpcion=true",function(data){
	      	var jsonMisExp =JSON.parse(data);// jQuery.parseJSON(data);
          resultadoConsulta=jsonMisExp;// guardo el formato json para usarlo posteriomente para crear los input
          
          $.each(jsonMisExp, function (KEY, VALOR) {
             var varpreguntas=  $('<option value="'+VALOR.id_pregunta+'" name="opcionpregunta" tipo="'+VALOR.identificador+'">  ').text(VALOR.pregunta);
              $('#opcionPreguntas').append(varpreguntas);
        
				   });		
     });

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
                        <div class="col-sm-4 invoice-col">
                          
                          <address>
                            <button id="agregarContraparte" type="button">Agregar Contraparte</button>
                                         <h1 style="display:none;"id="numExpedienteGlobal"></h1>
                                      </address>
                        </div>
                        <!-- /.col -->
                        
                        <!-- /.col -->
                       <!--  <div class="col-sm-4 invoice-col">
                          <b>Invoice #007612</b>
                          <br>
                          <br>
                          <b>Order ID:</b> 4F3S8J
                          <br>
                          <b>Payment Due:</b> 2/22/2014
                          <br>
                          <b>Account:</b> 968-34567
                        </div> -->
                        <!-- /.col -->
                      </div>
                      <div class="row">
                        <div class="col-xs-12 table">
                          <div id="preguntas">
                            
                          </div>
                         <!--  <div id="rrellenarPregunta">
                            
                          </div> -->
                          <form  id="rrellenarPregunta"  data-toggle="validator"enctype="multipart/form-data" role="form" class="" action ="../../controlador/expediente/seguimientoExpediente.php" object="defensor" method="post">
                          
                          </form> 
                          
                        </div>
                        <!-- /.col -->
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
    <script src="../../recursos/js/actividad/gestionActividad.js"></script>
    
    <script>

$('#myform').validator()
$('#myubicacion').hide()
$('#personal').hide()
$('#mycomprobante').hide()

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