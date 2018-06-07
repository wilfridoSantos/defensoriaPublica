<?php
session_start();
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 include_once( '../../controlador/defensor/controladorListaDef.php');
 //include_once( '../../controlador/usuario_servicio/lisaUsuario.php');
 
 
?><!-- 
   <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script> -->
    <script src="../../recursos/js/defensor/atendiendoDefensor.js"></script>
<script src="../../recursos/js/herramienta.js"></script> 
<style>
  .ui-autocomplete-loading {
    background: white url("../../recursos/images/cargando.gif") right center no-repeat;
  }
  </style>



        
 <script>
       
    var varUsuario=[];
    var datos = jQuery.parseJSON(window.Global_usuarios_servicios);
    $.each(datos, function (KEY, VALOR) {
                var temp={};
                  temp['label']=VALOR.nombre;
                  temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
                  temp['desc']=VALOR.colonia+", "+VALOR.municipio;
                  temp['id_usuario']=VALOR.id_usuario_servicio;
                  // console.log(VALOR);
                   varUsuario.push(temp);
                });
 $( function() {
      
  
    function log( message ) {


      var usuario=message.item.label+" "+message.item.apellidos;
         
      if($("#usuarios").val().indexOf(message.item.id_usuario)===-1){//PRIMERO CHECO SI ESQUE EL USUARIO NO FUE YA INSERTADO
        
            var tr=document.createElement("tr");
    //      $( "<tr><td>" ).text( message ).prependTo( "#usuarioSeleccionados" );
          var td=document.createElement("td");
              tr.appendChild(td);
              console.log(message);
              
              // $( td ).text( message ).prependTo( "#usuarioSeleccionados" );
              $( td ).text( usuario );// A ESTE TD LE ASIGO AL USUARIO DEL SERVICIO
              td.setAttribute("id_usuario_eliminar",message.item.id_usuario);
              //td.setAttribute("class","id_usuario_servicio");
              //td.setAttribute("name","id_usuario");


              
          $("#usuarioSeleccionados").append(tr);
          var td2=document.createElement("td"); 
              if($("#usuarios").val()==="")//? message.item.id_usuario: $("#usuarios").val()+","message.item.id_usuario);
                  $("#usuarios").val(message.item.id_usuario);
                else  
              $("#usuarios").val($("#usuarios").val()+","+message.item.id_usuario);
            
              $(td2).append("<button type='button' class='btn btn-primary eliminar col-md-7 col-xs-12'><span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </button>");   
          
            tr.appendChild(td2);
          $("#project").val("");
      }   
      $("#project").val("");//SIEMPRE LIMPIA EL INPUT DE BUSQUEDA  // $( "#usuarioSeleccionados" ).scrollTop( 0 );
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
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Crear Expediente</label></h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form  autocomplete="off" id="myform"  data-toggle="validator" role="form" class="" action ="../../controlador/expediente/registrarExpediente.php?tipo=html" object="defensor" method="post">

                   
                      
                     <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Nombre de usuario(s)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" value="{{curp}}"minlength="18" maxlength="18" name="curp" data-error="debe ser un formato de curp correcto" id="curp" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required="required" class="form-control col-md-7 col-xs-12">
                           --><input autocomplete="cualquier-cosa"  data-error="Seleccione al menos un usuario" type="text"  id="project"  required class="form-control col-md-7 col-xs-12">
                          
                          <div  class="help-block with-errors"></div></div>
                      </div></dib>                     
                     <!-- usuario seleccionados -->
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue"><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <table required="" id="tablaAsinacionExpedienteusuario" class="table table-striped ">
                          <tbody  required="" id="usuarioSeleccionados" style="height: 200px; width:915px; overflow: auto;" class=" ui-widget-content"></tbody>
                            
                          </table>
                          <div  class="help-block with-errors"></div>
                      </div></div></div>
                            
                     
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Numero de expediente<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required  onkeyup="mayusculas(event, this)" type="text"  name="expediente" id="expediente" data-error="Se requiere de un numero de expediente" class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div> </div>
                      </div></div>

                       <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="delito">Delito<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input required type="text" pattern="[A-Za-z ]+"  onkeyup="mayusculas(event, this)" onmouseout="verificarDelito(event,this)" onblur="verificarDelito(event,this)"   name="delito" id="delito" data-error="Solo letras"   class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div>  </div>
                      </div></div>

                        <div id="gradoDelito"  class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Grado de delito <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" id="id_gradodelito"   name="grado_delito"  class="form-control ">
                            <option value="">--SELECCIONE UNA OPCIÓN-</option>
                            <option value="GRAVE">GRAVE</option>
                            <option value="NO GRAVE"> NO GRAVE</option>
                            
                            
                          </select>
                          </div></div> 

                       

               
                          <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>
                          <input type="text" name="defensor" id="defensor" style="display:none;" value="<?php  echo $_SESSION['personal'][0]["id_personal"]?>"  class="form-control col-md-7 col-xs-12"/>
                          <!-- <input type="text" name="materia" id="materia" style="display:none;" value=""  class="form-control col-md-7 col-xs-12"/>
                -->
                  <!--    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Materia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="" onmouseout="cargaDefensorPorMateria(event,this)" onblur="cargaDefensorPorMateria(event,this)"  name="materia"  class="form-control ">
                            <option value="civil">Civil</option>
                            <option value="familiar"> Familiar</option>
                            <option value="penal"> Penal</option>
                            <option value="agrario"> Agrario</option>
                            <option value="mercantil"> Mercantil</option>
                            
                            
                          </select>
                          </div></div> -->


                      <!--  <div class="form-group  ">
                        <h4><label class="control-label col-md-3 col-sm-3 col-xs-12 ">Defensor <span class="required">*</span></label>
                       </h4> <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required=""  name="defensor" id="asignarDefensor" class="select2_group form-control">
                             <option > eleccione una opción</option>
                             
                               // $defensormateria=json_decode($contenido);
                             
                              
                                 
                           
                          </select>
                        </div>
                      </div>
                     -->
                      
                     
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						   <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" onmouseover="verificarDelito(event,this)" value="Crear Expediente"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                      </div>

                    </form>
                  </div>
                </div>

 <!-- <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script> -->
    <!-- <script src="../../recursos/js/custom.min.js"></script> -->
    <script src="../../recursos/js/curp.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>

    <script>
$('#gradoDelito').hide()

$('#myform').validator()
</script>