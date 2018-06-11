<?php 
  include '../../controlador/juzgado/actividad_juzgado.php';


  
?>
<script src="../../recursos/js/herramienta.js"></script>
<script>

  function validarFecha(e, elemento) {
   var fechas= document.getElementById("fechaNacimiento").value;
    
    console.log(fechas);
    var ano=fechas.split('-')[0];
    var mes=fechas.split('-')[1];
    var dia=fechas.split('-')[2];
    
    
   //   alert("fff");
   var date = new Date(ano,mes,dia)
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
	
	 
		if(ano < 1958 || ano > 1998)
    { 
      console.log("fecha invalida");
     $(".errors").remove();
      ul.setAttribute("class", "errors");

      ul.innerText="fecha invalida";
      error.appendChild(ul);
			//alert("Es necesario que el año de la Fecha de Nacimiento, se encuentre entre " + (dtmHoy.getFullYear() - 120)+ " y " + dtmHoy.getFullYear())
		//	document.ejemploForma.stranio.focus()
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

 function validarCurps() {
// pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)";
                        
   var curpNombre=document.getElementById("nombre").value;
   console.log("el nombre es ",curpNombre);
   
   var curpApaterno=document.getElementById('aPaterno').value;
   var curpAmaterno=document.getElementById('aMaterno').value;
   var curpGenero=(((document.getElementById("genero").options[document.getElementById("genero").selectedIndex].value)==="masculino")?'H':'M');
   var curpFecha= document.getElementById("fechaNacimiento").value.split('-');

   
   //var fechas= document.getElementById("fecha").value;
   var entidad=document.getElementById("entidad").options[document.getElementById("entidad").selectedIndex].value;

   console.log(entidad);
   
      var curp = generaCurp({
        nombre            : curpNombre,
        apellido_paterno  : curpApaterno,
        apellido_materno  : curpAmaterno,
        sexo              : curpGenero,
        estado            : entidad,
        fecha_nacimiento  : [curpFecha[2],curpFecha[1],curpFecha[0]]
      });

      console.log(curp.substr(0,13));
      console.log("el rfc",validarRfc());
      
      var claseCurp=document.getElementById("curp");
      claseCurp.setAttribute("pattern",curp.substr(0,13)+'[A-Za-z]{3}[0-9]{2}');
     
 }


 
 


 function validarRfc() {
                        
                        var rfcNombre=document.getElementById("nombre").value;
                        var rfcApaterno=document.getElementById('aPaterno').value;
                        var rfcAmaterno=document.getElementById('aMaterno').value;
                        var rfcFecha= document.getElementById("fechaNacimiento").value.split('-');
                        
                         var query="apellidoM="+rfcAmaterno+"&apellidoP="+rfcApaterno+"&nombre="+rfcNombre+"&dia="+rfcFecha[2]+"&mes="+rfcFecha[1]+"&anno="+rfcFecha[0]
                         url="../../controlador/CalcularRfc.php?"+ query;//apellido_materno=GARCIA&apellido_paterno=HERNANDEZ&fecha=1988-03-17&nombre=OTHON&solo_homoclave=0"
   
                         $.ajax({
                           url: url,
                           type: "GET",
                         //	data: "cveCurp=SALW941012HOCNPL04",
                           beforeSend: function(xhrObj){
                                     xhrObj.setRequestHeader("Content-Type","application/json");
                                     xhrObj.setRequestHeader("Accept","application/json");
                            
                             },
                           success: function (data) {
                              var rfc=data;
                              var claserfc=document.getElementById("rfc");
                              console.log(rfc);
                              
                           claserfc.setAttribute("pattern",rfc.trim());
                     
                           }
                         });  
                          
                      }
</script>

<script>
function verificarCargo(e, elemento){
    if(elemento.selectedIndex===2){
       $("#materia").hide();
       $("#instancia").hide();
        
      }
   
     if(elemento.selectedIndex===1){
        $("#materia").show();
        $("#instancia").show();
      }
    }
 
    function verificarMateria(evento, elemento){
       console.log("holas instancia",elemento.selectedIndex);
    if((elemento.selectedIndex==1)||(elemento.selectedIndex==2)||(elemento.selectedIndex==3))
       $("#instancia").show();
   else 
      $("#instancia").hide();
         
     
    }




function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.php");
      }


</script>


     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Registro  personal de campo</label></h1>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="agregarjuzado" onclick="agrega()">
                            <label  ><h3>agregar Juzgado</h3></label></a>
                        </li>
                   
                        </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form id="myform"  data-toggle="validator" role="form" class="example_form form-horizontal form-label-left" action ="../../controlador/defensor/registrar_Defensor.php?" object="defensor" method="post">

                        <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Nombre<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text"  id="nombre" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="40" minlength="4" autofocus="autofocus"   required class="form-control text-uppercase" data-error="se letras no máximo de 40 ni mánimo de 4" placeholder="Nombre" name="nombre">
                              <div  class="help-block with-errors"></div>
                            </div>
                       </div>
                       <div class="item form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Nup<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text"  pattern="(\d{5})" data-error="solo número de 5 dígito"  maxlength="5" minlength="5" class="form-control" required placeholder="nup" name="nup">
                          <div  class="help-block with-errors"></div></div>
                      </div>
                      <div class="item form-group  col-md-6 col-sm-6 col-xs-12 ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Apellido Paterno<span class="required">*</span></label>
                         </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" id="aPaterno" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+" data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4"  required class="form-control  text-uppercase" placeholder="Apellido Paterno" name="apellido_paterno">
                            <div  class="help-block with-errors"></div></div>
                       </div>
                      <div class="item form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 "> Nue<span class="required">*</span></label>
                        </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]+"  data-error="solo número de 5 dígito" maxlength="5" minlength="5" class="form-control" required  placeholder="nue" name="nue">
                          <div  class="help-block with-errors"></div> </div>
                      </div>

                       

                        <div class="item form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4>  <label class="control-label col-md-4 col-sm-3 col-xs-1 " >Apellido Materno<span class="required">*</span></label>
                          </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" id="aMaterno" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+"  data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4" required class="form-control  text-uppercase" placeholder="Apellido Materno" name="apellido_materno">
                            <div  class="help-block with-errors"></div> </div>
                       </div> 
                   

                       <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Teléfono<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12"  >
                          <input type="tel" pattern="([0-9]{13})|([0-9]{10})"  maxlength="13" minlength="10" class="form-control " data-error=" solo numero telefonico" required placeholder="Telefono" name="telefono">
                          <div  class="help-block with-errors"/></div>
                      </div>

                      <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-4 col-sm-3 col-xs-12 " >Fecha nacimiento<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input id="fechaNacimiento" type="date"  onkeyup="validarFecha(event,this)" onblur="validarFecha(event,this)" title"fecha invalido" pattern="" data-error="fecha invalida" maxlength="50" class="form-control" required="" placeholder="Email" name="fecha">
                                 <div  class="help-block with-errors"></div>
                              </div> 
                      </div>  


                     

                    
                    <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-4 col-sm-3 col-xs-12 " >Email<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input type="text" title"correo invalido"  pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" data-error="correo invalido" maxlength="50" class="form-control" required="" placeholder="Email" name="email">
                              <div  class="help-block with-errors"></div>  </div> 
                      </div>  


                                        
                      
                    
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Entidad federativa</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                           <select id="entidad" name="strEntidadNacimiento" class="select2_group form-control textbox">
                             <option value="">- Seleccione -</option> 
                             <option value="AS">AGUASCALIENTES</option>
                             <option value="BC">BAJA CALIFORNIA</option>
                             <option value="BS">BAJA CALIFORNIA SUR</option>
                             <option value="CC">CAMPECHE</option> 
                             <option value="CL">COAHUILA DE ZARAGOZA</option>
                             <option value="CM">COLIMA</option>
                             <option value="CS">CHIAPAS</option>
                             <option value="CH">CHIHUAHUA</option>
                             <option value="DF">DISTRITO FEDERAL</option>
                             <option value="DG">DURANGO</option>
                             <option value="GT">GUANAJUATO</option>
                             <option value="GR">GUERRERO</option> <option value="HG">HIDALGO</option> <option value="JC">JALISCO</option> <option value="MC">MEXICO</option> <option value="MN">MICHOACAN DE OCAMPO</option> <option value="MS">MORELOS</option> <option value="NT">NAYARIT</option> <option value="NL">NUEVO LEON</option> <option value="OC">OAXACA</option> <option value="PL">PUEBLA</option> <option value="QT">QUERETARO DE ARTEAGA</option> <option value="QR">QUINTANA ROO</option> <option value="SP">SAN LUIS POTOSI</option> <option value="SL">SINALOA</option> <option value="SR">SONORA</option> <option value="TC">TABASCO</option> <option value="TS">TAMAULIPAS</option> <option value="TL">TLAXCALA</option> <option value="VZ">VERACRUZ</option> <option value="YN">YUCATAN</option> <option value="ZS">ZACATECAS</option> <option value="NE">NACIDO EN EL EXTRANJERO</option></select>
                           </div>
                      </div>
                    
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Puesto</label>
                        </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <select onkeyup="verificarCargo(event,this)" onblur="verificarCargo(event,this)" name="puesto"  class="select2_group form-control">
                             <option value="">- Seleccione -</option> 
                             <option value="4">defensor</option> 
                           <!--   <option value="2">coordinador</option>  -->  
                          </select>
                        </div>
                      </div>

                
                     
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Género<span class="required">*</span></label> </h4>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        <select  required id="genero" onkeyup="validarCurps()" onblur="validarCurps()"  name="genero"  class="select2_group form-control">
                             <option value="">- Seleccione -</option> 
                             <option value="masculino">masculino</option> 
                             <option value="femenino">femenino</option>   
                          </select>
                        </div>
                      </div>
                      
                      <div class="item form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Rfc<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" id="rfc" tidata-error="El rfc es invalido"   onkeyup="mayusculas(event, this)" onblur="validarRfc()"  maxlength="18" pattern=""class="form-control  text-uppercase"  required placeholder="Rfc" name="rfc">
                          <div  class="help-block with-errors"></div> </div>
                      </div>


                       <div class="item form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Curp<span class="required">*</span></label></h4>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" id="curp" tidata-error=": el formato debe ser alfanumerico con 18 digitos"   onkeyup="mayusculas(event, this)" onblur="validarCurps()"  maxlength="18" pattern=""class="form-control  text-uppercase"  required placeholder="curp" name="curp">
                          <div  class="help-block with-errors"></div> 
                        </div>
                      </div>


                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Adscripción</label> </h4> 
                        <div class="col-md-8 col-sm-9 col-xs-12">
                          <select name="adscripcion"  class="select2_group form-control">
                          <option value="">- Seleccione -</option> 
                              <?php
                                    $juzgadosRegion=json_decode($contenidojuzgado);
                                            foreach($juzgadosRegion as $obj=>$valores){
                                             // echo $obj."fsdfwegfwefwefwef";  
                                               echo ' <optgroup label="'.$obj.'">';
                                              foreach($valores as $valor){
                                                  echo '<option value='.$valor->id_juzgado.'>'.$valor->nombre.'</option> ';
                                                }
                                                 echo  '</optgroup>';
                                          }
                                  ?>                           
                          </select> 
                        </div>
                      </div> 

                    

                    <div id="materia" class="item form-group col-md-6 col-sm-6 col-xs-12 form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Materia <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <select required name="materia"onkeyup="verificarMateria(event,this)" onblur="verificarMateria(event,this)" class="select2_group form-control ">
                             <option value="">- Seleccione -</option> 
                             <option value="Civil">Civil</option> 
                             <option value="Familiar">Familiar</option>  
                             <option value="Penal">Penal</option>  
                             <option value="Agrario">Agrario</option>  
                             <option value="Mercantil">Mercantil</option>  
                             <option value="Amparo">Amparo</option>  
                             <option value="Ejecucion">Ejecución de sanciones</option>  
                             <option value="Mixto">Mixto</option>  
                              
                          </select>
                          </div>
                      </div>
                                          
                      
                   
                      
                     


                    

                         <div id="instancia" class="item form-group col-md-6 col-sm-6 col-xs-12 form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Instancia <span class="required">*</span>
                         </label>
                         <div class="col-md-8 col-sm-6 col-xs-12">
                          <select name="instancia" required class="select2_group form-control ">
                             <option value="1">1 Instancia</option>  
                             <option value="2">2 Instancia</option>  
                          </select>
                         </div>
                     </div>

                      <div id="sistema" class="item form-group col-md-6 col-sm-6 col-xs-12 form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Sistema <span class="required">*</span>
                         </label>
                         <div class="col-md-8 col-sm-6 col-xs-12">
                          <select name="sistema" required class="select2_group form-control ">
                             <option value="ORAL"> Oral</option>  
                             <option value="TRADICIONAL"> Tradicional</option>  
                          </select>
                         </div>
                     </div>
                   
                    
                     <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Contraseña<span class="required">*</span></label></h4> 
                          <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" data-error="debe contener al menos  una mayúscula y número con minimo 8 carácter"  min="8" max="20"  class="form-control"  required placeholder="contraseña" name="password">
                          <div  class="help-block with-errors"></div>
                         </div>
                      </div>
                   
                    

                          <div id="gender" required class="btn-group" data-toggle="buttons">
                           
                           </div>

                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						                 <button class="btn btn-primary btn btn-info btn-lg" type="reset">Limpiar</button>
						                  <input type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Guardar"/>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>





    <!-- jQuery -->
 <!--    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
     -->
    <script src="../../recursos/js/jquery-validator.js"></script>
    <script src="../../recursos/js/curp.js"></script>
<!-- Google Analytics -->
<script>

$('#myform').validator()


var curp2 = generaCurp({
  nombre            : 'Griselda',
  apellido_paterno  : 'Mendez',
  apellido_materno  : 'Cortes',
  sexo              : 'M',
  estado            : 'OC',
  fecha_nacimiento  : [17, 03, 1993]
});
console.log(curp2);

</script>
	
  