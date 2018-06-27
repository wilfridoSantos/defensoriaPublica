<?php
     include_once('../../controlador/defensor/controladorListaDef.php');
?>
<script src="../../recursos/js/estadistica/atendiendoEstadistica.js"></script>
 <script src="../../recursos/js/jquery-ui.1.12.1.js"></script> 
   <script src="../../recursos/js/herramienta.js"></script> 
 
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>



<link href="../../recursos/css/custom.css" rel="stylesheet" />
<script src="../../recursos/js/jquery-validator.js"></script>


<script>       
       var varUsuario=[];
       console.log(window.Global_defensores, ' valor del global');
       //var datos = $.parseJSON(window.Global_defensores);
       var datos= window.Global_defensores;
       $.each(datos, function (KEY, VALOR) {
                   var temp={};
                    if(VALOR.id_personal > 0){
                            temp['label']=VALOR.nombre;
                            temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
                            temp['desc']=VALOR.colonia+", "+VALOR.municipio;
                            temp['id_usuario']=VALOR.id_personal;
                            //console.log(VALOR);
                            varUsuario.push(temp);
                    }
                   });
    $( function() {             
        function log( message ) {
          var usuario=message.item.label+" "+message.item.apellidos;
          if($("#usuarios").val()!= " " || $("#usuarios").val()!= ""){//PRIMERO CHECO SI ESQUE EL USUARIO NO FUE YA INSERTADO
            $('#usuarioSeleccionados').empty();
            var tr=document.createElement("tr");
            //      $( "<tr><td>" ).text( message ).prependTo( "#usuarioSeleccionados" );
            var td=document.createElement("td");
            tr.appendChild(td);
            //console.log(message);
        
            // $( td ).text( message ).prependTo( "#usuarioSeleccionados" );
            $( td ).text( usuario );// A ESTE TD LE ASIGO AL USUARIO DEL SERVICIO
            td.setAttribute("id_usuario_eliminar",message.item.id_usuario);
            //td.setAttribute("class","id_usuario_servicio");
            //td.setAttribute("name","id_usuario");
            $("#usuarioSeleccionados").append(tr);
            var td2=document.createElement("td");         
            $("#usuarios").val(message.item.id_usuario);          
            $(td2).append("<button type='button' class='btn btn-primary eliminar col-md-7 col-xs-12'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </button>");   
            tr.appendChild(td2);
            //$("#project").text(usuario);
          }   
          $("#project").attr('disabled', true);//SIEMPRE LIMPIA EL INPUT DE BUSQUEDA  // $( "#usuarioSeleccionados" ).scrollTop( 0 );
        }///TERMINA LA FUCION
      $( "#project" ).autocomplete({
         minLength: 0,
         source: varUsuario,
         focus: function( event, ui ) {
           $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
           return false;
         },
         select: function( event, ui ) {
           var usuario=ui.item.label+" "+ui.item.apellidos;
            log(ui);
           return false;
         }
       })
       .autocomplete( "instance" )._renderItem = function( ul, item ) {
         return $( "<li>" )
           .append( "<div>" + item.label +" "+item.apellidos+ "<br>" + item.desc + "</div>" )
           .appendTo( ul );
       };
    });
   </script>
   

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Solicitar consulta de actividades<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="myform" data-toggle="validator" role="form" class="form-horizontal form-label-left" >
                    <label class="control-label " style="padding-left:300px;" >PERIODO 
                        </label><br>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputInicio"  required="required" data-error="Seleccione una fecha valida." class="form-control controlFecha"  data-error="Debe ser menor a la fecha Final." name="inputInicio" onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)"  step="1">                                                   
                          <div  class="help-block with-errors"></div> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha Final <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputFinal" name="inputFinal" required="required" data-error="Seleccione una fecha valida." class="form-control controlFecha"  onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" step="1">
                          <div  class="help-block with-errors"></div> 
                          <div id="labelFinal" class='block-help with-errors'></div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">                        
                                <select required="required"  id="selectSistema" name="selectSistema" data-error="Seleccione un sistema." aria-controls="datatable-responsive" class="form-control input-sm" onchange="myFunctionDate(this.value)">
                                    <option value="">Seleccione un sistema</option>
                                    <option value="TRADICIONAL">Tradicional</option>
                                    <option value="ORAL">Acusatorio y Oral</option>
                                    <option value="JUSTICIA">Justicia para Adolecentes</option>
                                    <option value="ALL">Todos</option>
                                </select>
                                <div  class="help-block with-errors"></div> 
                    </div>
                      </div>
                      <div class="form-group" id="checkDefensor" name="checkDefensor">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Defensor en especifico? </label>
                        <div class="col-sm-1 ">
                          <input type="checkbox" unchecked id="checkDefensor" name="checkDefensor" class="form-control" onchange="seleccionarUnDefensor(this)" >                          
                        </div>
                        <div id="idCheckDefensor" name="idCheckDefensor" style="display:none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input data-error="Seleccione un defensor" type="text"  id="project"  required class="form-control col-md-7 col-xs-12">                          
                                <div  class="help-block with-errors"></div>
                            </div>
                            <div class="form-horizontal form-label-left">
                              <div class="form-group ">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue"><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <table required="" id="tablaAsinacionExpedienteusuario" class="table table-striped ">
                                          <tbody required="" id="usuarioSeleccionados" style="height: 200px; width:915px; overflow: auto;" class=" ui-widget-content"></tbody></table>
                                    <div class="help-block with-errors"></div>
                                </div>
                              </div>
                            </div>
                            <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>                    
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Consultas <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">                        
                                <select required="required"  id="selectConsulta" name="selectConsulta" data-error="Seleccione un sistema." aria-controls="datatable-responsive" class="form-control input-sm" onchange="myFunctionDate(this.value)">
                                    <option value="">Seleccione una consulta para las actividades</option>
                                    <option value="NUM">Numero de actividades realizadas</option>
                                    <option value="C2">Consulta2</option>
                                    <option value="C3">Consulta3</option>
                                </select>
                                <div  class="help-block with-errors"></div> 
                    </div>
                      </div>

                    <div class="row no-print">
						             <div class="col-xs-12">
						               <button class="btn btn-success pull-right" id="botonDesc" name ="botonDesc"disabled onclick="solicitarConsultaAct();" style="margin-right: 5px;">
						                <i class="fa fa-download"></i> Realizar consulta</button>
					             </div>
						           </div>
                       </form>
                  </div>
                </div>
              </div>

              <div id="resultadoConsulta" name="resultadoConsulta" >

              </div>

<script src="../../recursos/js/jquery-validator.js"></script>
<script>

$('#myform').validator()

</script>
	