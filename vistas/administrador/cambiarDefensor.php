<?php
     include_once( '../../controlador/defensor/controladorListaDef.php');

?>
 <script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
 <script src="../../recursos/js/administrador/atendiendoAdmin.js"></script>
<script src="../../recursos/js/herramienta.js"></script> 
   <script>       
       var varUsuario=[];
       var datos = jQuery.parseJSON(window.Global_usuarios_servicios);
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
     } );
   </script>
     <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h3><label class="control-label col-md-12 col-sm-3 col-xs-12 " >Cambio de Defensor</label></h3>                    
                    <div class="ln_solid"></div>
                </div>

                <div class="x_content">                    
                    <form  class="" action ="../../controlador/defensor/cambiarDefensor.php" object="defensor" method="post">
                        <div class="form-horizontal form-label-left">                     
                            <div class="form-group ">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Defensor<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <input data-error="Seleccione un defensor" type="text"  id="project"  required class="form-control col-md-7 col-xs-12">                          
                              <div  class="help-block with-errors"></div>
                        </div>
                            </div>
                            <div class="form-horizontal form-label-left">
                            <div class="form-group ">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <table required="" id="tablaAsinacionExpedienteusuario" class="table table-striped ">
                                        <tbody required="" id="usuarioSeleccionados" style="height: 200px; width:915px; overflow: auto;" class=" ui-widget-content"></tbody>

                                    </table>

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>
                        <input type="text" name="expedienteNum" id="expedienteNum" value="<?php echo $_GET['id_exp'] ?>"  style="display:none;" class="form-control col-md-7 col-xs-12"/>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						            <input id="asignarDefensor" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="cambiar"/>                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                

