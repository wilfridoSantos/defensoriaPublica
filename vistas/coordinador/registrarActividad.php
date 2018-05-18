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
  function cargaDefensorPorMateria(e, elemento) {
    
    $.ajax({
			url: "../../controlador/defensor/controlDefensor.php",
			type: "GET",
			data: "materia="+elemento.options[elemento.selectedIndex].value,
			beforeSend: function () {

		//	$('#menuContainer').load('listarDefensores.php');
			},
			success: function (data) {
				//console.log('Success!! Eliminado defensor id = '+idDef);
      //  console.log(data);
      var json=jQuery.parseJSON(data)
      $("#asignarDefensor").children().remove();
        $.each(json,function(key, valor) {
          $("#asignarDefensor").append("<option value="+valor.id_personal+">"+valor.nombre+" "+valor.ap_paterno+" "+valor.ap_materno+" </option>");
          console.log(valor);
            });
		
			}
		});
    
   
}


function validarFecha(e, elemento) {
 var fechas= document.getElementById("fechaNacimiento").value;
  
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
   // $(".with-errors").append("<ul class='list-unstyled'><li>solo 4 digito en el a</li></ul>");
    console.log("joijoiuiu");
    
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form  id="myform"  data-toggle="validator" role="form" class="" action ="../../controlador/actividad/registroActividad.php?tipo=html" object="defensor" method="post">

                   
                      
                     <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" minlength="18" maxlength="18" name="curp" id="curp" required="required" class="form-control col-md-7 col-xs-12" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)">
                        </div>
                      </div>
                      
                      <div class=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " >Fecha de actividad <span class="required">*</span></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                              <input id="fecha_registro" type="date"  onkeyup="validarFecha(event,this)" onblur="validarFecha(event,this)" data-error="fecha invalido" pattern="" data-error="fecha invalida" maxlength="50" class="form-control" required="" placeholder="Email" name="fechaRegistro">
                                 <div  class="help-block with-errors"></div>
                              </div> 
                      </div>  
                   
        


                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Resultado u observación<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <!--  <input type="textArea" name="resultado"  minlength="10" maxlength="200" name="expediente" id="expediente"  class="form-control col-md-7 col-xs-12">
                          --> <textarea name="resultado" pattern="([a-z0-9 ]+)" data-error="solo numeros o letras en minisculas con minimo 10 caracter" rows="10" cols="150"  minlength="10" maxlength="250" class="form-control col-md-7 col-xs-12"  placeholder="describre el resultado u observaciones"></textarea>
                          <div  class="help-block with-errors"></div>
                      </div>
                    
                      
                      <div id="actividad" sclass=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " ></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <select required=""  name="actividad"  class="form-control ">
                                <option value="asesoria"></option>
                            </select>
                              </div> 
                      </div>  </div> 
                      

                       <div id="personal" sclass=" form-horizontal form-label-left form-group  "><div class="form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-3 col-sm-3 col-xs-12 " ></label>
                            </h4><div class="col-md-6   col-sm-6 col-xs-12">
                            <input id="id_personal" type="text" name="id_personal"  required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_personal?>">
                      
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

<script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../recursos/js/custom.min.js"></script>
    <script src="../../recursos/js/curp.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>
    <script src="../../recursos/js/actividad/gestionActividad.js"></script>
    
    <script>

$('#myform').validator()
$('#actividad').hide()
$('#personal').hide()
getJuzgado(<?php $id_personal?>);

</script>