<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 include_once( '../../controlador/defensor/controladorListaDef.php');

 session_start();
// print_r($_SESSION['personal']);
  $id_personal = $_SESSION['personal'][0]['id_personal'];
  $nombre = $_SESSION['personal'][0]['nombre'];
  //echo $id_personal;
  //echo $nombre;

 
?>
   <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<script src="../../recursos/js/herramienta.js"></script>
 <script>
  
    
    var varUsuario=[];
    var datos = jQuery.parseJSON(window.Global_usuarios_servicios);
    $.each(datos, function (KEY, VALOR) {
                var temp={};
                  temp['label']=VALOR.nombre;
                  temp['apellidos']=VALOR.ap_paterno+" "+VALOR.ap_materno;
                  temp['desc']=VALOR.colonia+", "+VALOR.municipio;
                  temp['id_usuario']=VALOR.id_usuario_servicio;
                  temp['curp']=VALOR.curp;
                  // console.log(VALOR);
                   varUsuario.push(temp);
                });
 $( function() {
      
  
    $( "#project" ).autocomplete({
      minLength: 0,
      source: varUsuario,
      focus: function( event, ui ) {
        $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
       
      // console.log(ui);
        return false;
      },
      select: function( event, ui ) {
        var usuario=ui.item.label+" "+ui.item.apellidos;
        $( "#project" ).val(ui.item.label+" "+ ui.item.apellidos );
      
        $( "#curp" ).val(ui.item.curp );
        $( "#curpMostrado" ).val(ui.item.curp );
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label +" "+item.apellidos+ "<br>" + item.desc + "</div>" )
        .appendTo( ul );
    };
  } );
   


function validarFecha(e, elemento) {
 var fechas= document.getElementById("fecha_registro").value;
  
  //console.log(fechas);
  var ano=fechas.split('-')[0];
  var mes=fechas.split('-')[1];
  var dia=fechas.split('-')[2];
  
  
 //   alert("fff");
 var date = new Date()
//   var error=elemento.parentElement.children[1];
 var error=elemento.parentElement;

 // removeChild
 
var ul=document.createElement('li');
 //  ul.setAttribute("class", "errors");
      if(ano == "" || ano.length < 4 || ano.search(/\d{4}/) != 0)
      {
    $(".errors").remove();
    ul.setAttribute("class", "errors");
        ul.innerText="solo 4 digito";
         error.appendChild(ul);
  
          return false;
      }   
  
 if(ano <date.getFullYear() || ano > date.getFullYear())
  { 
    console.log(" año invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="año invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  }  
 

  if(mes < date.getMonth()+1 || mes > date.getMonth()+1)
  { 
    console.log("mes invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="Mes invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  } 

  if(dia < date.getDate()-5 || dia > date.getDate())
  { 
    console.log("fecha invalida");
   $(".errors").remove();
    ul.setAttribute("class", "errors");

    ul.innerText="Dia invalida";
    error.appendChild(ul);
          return false;
  } 
  else{
    $(".errors").remove();
  } 
      
  
  
  intMes  = parseInt(dia);
  intDia  = parseInt(mes);
  intano=parseInt(ano);

  
   console.log( date.getYear());
}

</script>
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Registro Actividad</label></h1>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form  id="myform"  data-toggle="validator"enctype="multipart/form-data" role="form" class="" action ="../../controlador/actividad/registroActividad.php?tipo=html" object="defensor" method="post">

                   
                   <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Nombre de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" value="{{curp}}"minlength="18" maxlength="18" name="curp" data-error="debe ser un formato de curp correcto" id="curp" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required="required" class="form-control col-md-7 col-xs-12">
                           --><input data-error="Seleccione al menos un usuario" type="text"  id="project"  required class="form-control col-md-7 col-xs-12">
                          
                          <div  class="help-block with-errors"></div></div>
                      </div></dib>

                      <!-- ESTE CURP SE OCULTA Y ES EL QUE SE ENVIA AL POST -->
                     <div id="div_curp"  class="form-horizontal form-label-left">     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" minlength="18" data-error="formato invalido" data-error="fecha invalida" maxlength="18" name="curp" id="curp" required="required" class="form-control col-md-7 col-xs-12" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)">
                           --><input type="text"  minlength="18" data-error="formato invalido" data-error="fecha invalida" maxlength="18" name="curp" id="curp" required="required" class="form-control col-md-7 col-xs-12" >
                          <div  class="help-block with-errors"></div></div> 
                      </div>
                      </div>

                      <!-- ESTE CURP SE OCULTA Y ES EL NO QUE SE ENVIA AL POST -->
                     <div  class="form-horizontal form-label-left">     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curp">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" minlength="18" data-error="formato invalido" data-error="fecha invalida" maxlength="18" name="curp" id="curp" required="required" class="form-control col-md-7 col-xs-12" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)">
                           --><input type="text"  disabled minlength="18" data-error="formato invalido" data-error="fecha invalida" maxlength="18" name="curpMostrado" id="curpMostrado" novalidate class="form-control col-md-7 col-xs-12" >
                          <div  class="help-block with-errors"></div></div> 
                      </div>
                      </div>
                      
                      <div class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " >Fecha de actividad <span class="required">*</span></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                              <input id="fecha_registro" type="date"  onkeyup="validarFecha(event,this)" onblur="validarFecha(event,this)" data-error="fecha invalido" pattern="" data-error="fecha invalida" maxlength="50" class="form-control" required="" placeholder="Email" name="fechaRegistro">
                                 <div  class="help-block with-errors"></div>
                              </div> 
                      </div>
                      </div>  

                       <!-- se requiere para identificar el tipo de actividad -->
                       <div   id="actividad" class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " >Actividad <span class="required">*</span></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <select id="miactividad" required=""  name="actividad"  class="form-control " onblur="verificacionActividad(event,this)">
                                <option value="asesoria"> Asesoría</option>
                                <option value="visita">Visita carcelaria</option>
                                <option value="audiencia"> Audiencia</option>
                            </select>
                              </div> 
                      </div>  </div> 
        


                      <div  class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Resultado u observación<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <!--  <input type="textArea" name="resultado"  minlength="10" maxlength="200" name="expediente" id="expediente"  class="form-control col-md-7 col-xs-12">
                          --> <textarea id="resultado" name="resultado" onclick="verificacionActividad()" pattern="([A-Z|a-z])[a-z0-9.,:áéíóúñ ]+" data-error="solo numeros o letras en minisculas con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describre el resultado u observaciones"></textarea>
                          <div  class="help-block with-errors"></div>
                      </div></div></div> 

                  <div id="mycomprobante" class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="comprobante" class="control-label col-md-3 col-sm-3 col-xs-12 " >Comprobante <span class="required">*</span></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <!--   <input  data-error=""  data-error="fecha invalida" maxlength="50" class="form-control"  placeholder="cargar archivo" name="comprobante">
                               <input id="comprobante" class="inputfile" type="file" id="comprobante" name ="comprobante">
                            -->  <input type="file" name="archivo" id="archivo"></input>

                                 <div  class="help-block with-errors"></div>
                              </div> 
                      </div>
                      </div>
                   
                            <!--// se requiere para identificar al personal  -->
                       <div id="personal" class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " ></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <input id="id_personal" type="text" name="id_personal"  required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_personal?>">
                      
                              </div> 
                      </div>  </div> 
                      

                          <!--// se requiere para la ubicacion  -->
                          <div id="myubicacion" class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " ></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <input id="ubicacion" type="text" name="ubicacion"   class="form-control col-md-7 col-xs-12" value="" >
                      
                              </div> 
                      </div>  </div> 
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						             <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Registrar Actividad"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                      </div>

                    </form>
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
$('#div_curp').hide()

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