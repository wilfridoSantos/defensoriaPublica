<?php 
  include '../../controlador/juzgado/actividad_juzgado.php';
?>

<script>

function cerrar(){
			 $('#registroContraparte').children().remove();
      }
      

</script>

<script src="../../recursos/js/herramienta.js"></script>
<script>
 var isNino=false;
 var isFamiliar=false;
  function validarFecha(e, elemento) {
   var fechas= document.getElementById("fechaNacimiento").value;
    
    console.log(fechas);
    var ano=fechas.split('-')[0];
    var mes=fechas.split('-')[1];
    var dia=fechas.split('-')[2];
    
    
   //   alert("fff");
  // var date = new Date(ano,mes,dia)
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
	// var anioMaximo=2000;//aplicando para adultos
	// var anioMinimo=1937;// año minimo apliando para adultos
	 var anioMaximo=80;//aplicando para adultos
	 var anioMinimo=18;// año minimo apliando para adultos
	  if(isNino===true){
        anioMaximo=17;//aplicando para ni;o
	      anioMinimo=05;// año minimo apliando para ni;o
	    }
    console.log("is niño", isNino);
	//	if(ano <= (date.getFullYear()-5) || ano > 1998)
		if(ano <  (date.getFullYear()-anioMaximo) || ano >(date.getFullYear()-anioMinimo))
    { 
	    console.log("fecha que maximo", (date.getFullYear()-anioMaximo));
	    console.log("fecha que se minimo", (date.getFullYear()-anioMinimo));
      console.log("fecha invalida");
   // alert("Seleccione correctame el tipo de usuario a registrar")
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

	
  }
var datosDelUsuario=JSON.parse(Global_user_basic)[0];

$("#divNino").hide();
  $("#divEjecucion").hide();
  $("#divFamiliar").hide();
if(datosDelUsuario.materia==="FAMILIAR"&datosDelUsuario.instancia==="1"){
  
    $("#divNino").show();
    var isFamiliar=$("#isNino").val();
   $(function() {
      $('#isNino').change(function() {
          isNino=$(this).prop('checked');
          console.log("es nino? ",$(this).prop('checked'));
           validarFecha(null,document.getElementById('fechaNacimiento'));
      })
   })
  
}
if(datosDelUsuario.materia==="EJECUCION"){
  $("#divEjecucion").show();

 $(function() {
    $('#isFamiliar').change(function() {
      isFamiliar=$(this).prop('checked');
      $("#divFamiliar").hide();
      if(isFamiliar)
        $("#divFamiliar").show();
//        console.log("es familiar ",$(this).prop('checked'));

    })
 })

}

 function validarCurps() {
// pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)";
                        
   var curpNombre=document.getElementById("nombre").value;
   console.log("el nombre es ",curpNombre);
   
   var curpApaterno=document.getElementById('aPaterno').value;
   var curpAmaterno=document.getElementById('aMaterno').value;
   var curpGenero=(((document.getElementById("sexo").options[document.getElementById("sexo").selectedIndex].value)==="masculino")?'H':'M');
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
      var claseCurp=document.getElementById("curp");
      claseCurp.value=curp;
      claseCurp.setAttribute("pattern",curp.substr(0,13)+'[A-Za-z]{3}[0-9]{2}');
     
      var id_contraparte=document.getElementById("id_contraparte");
          id_contraparte.value=curp
      
     
 }
</script>

    <script src="../../recursos/js/expediente/registrarContraparte.js"></script>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Registro   usuario de contraparte</label></h1>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li class="dropdown">
                       <button type="" onclick="cerrar()"><a class="close-link"><i class="fa fa-close"></i></a></button>
                      
                      </li>
                      <li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="" id="divNino">
                            <label>
                              <style> .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
                                    .toggle.ios .toggle-handle { border-radius: 20px; }
                                  </style>
                                  <input type="checkbox" id="isNino"  data-toggle="toggle" data-style="ios">  NIÑO(A)/ADOLECENTES?
                             </label>
                           </div>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <div class="" id="divEjecucion">
                            <label>
                              <style> .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
                                    .toggle.ios .toggle-handle { border-radius: 20px; }
                                  </style>
                                  <input type="checkbox" id="isFamiliar"  data-toggle="toggle" data-style="ios">  Es familiar?
                             </label>
                           </div>
                        </div>
                  </div>


                 
                    <br/>
                    
                    <!-- <form  id="myform"  data-toggle="validator" role="form" class="form-horizontal form-label-left" action ="../../controlador/expediente/registrarContraparte.php" object="defensor" method="post">
 -->                    <form  id="myform" name="formcontraparte" data-toggle="validator" role="form" class="form-horizontal form-label-left"  object="defensor">

                      
                      <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Nombre<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text"  id="nombre" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ ]+" onkeyup="mayusculas(event, this)" maxlength="40" minlength="4" autofocus="autofocus"   required class="form-control text-uppercase" data-error="se letras no máximo de 40 ni mánimo de 4" placeholder="Nombre" name="nombre">
                              <div  class="help-block with-errors"></div>
                            </div>
                       </div>

                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >calle<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input id="calle" type="text" pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+"  onkeyup="mayusculas(event, this)" maxlength="50" minlength="4"  data-error=": solo palabras de minimo 4 carácter "class="form-control" required placeholder="" name="calle">
                          <div  class="help-block with-errors"></div></div>
                      </div>
                      
                      <div class="item form-group  col-md-6 col-sm-6 col-xs-12 ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Apellido Paterno<span class="required">*</span></label>
                         </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" id="aPaterno" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+" onkeyup="mayusculas(event, this)" data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4"  required class="form-control  text-uppercase" placeholder="Apellido Paterno" name="apellido_paterno">
                            <div  class="help-block with-errors"></div></div>
                       </div>
                       
                       <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 "> Numero<span class="required">*</span></label>
                        </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[1-9][0-9]*" maxlength="5" id="numero" minlength="1" data-error="solo numero intero con maxicmo 5 digito" class="form-control" required  placeholder="" name="numero">
                          <div  class="help-block with-errors"></div></div>
                      </div>
                
                      

                         <div class="item form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4>  <label class="control-label col-md-4 col-sm-3 col-xs-1 " >Apellido Materno<span class="required">*</span></label>
                          </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" id="aMaterno" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+"  onkeyup="mayusculas(event, this)" data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4" required class="form-control  text-uppercase" placeholder="Apellido Materno" name="apellido_materno">
                            <div  class="help-block with-errors"></div></div>
                       </div> 
                      
                       <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Email<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input id="email" type="text"  data-error="correo invalido" class="form-control" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" required placeholder="Email" name="email">
                              <div  class="help-block with-errors"></div></div>
                      </div> 

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Entidad federativa de nacimiento<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                      <select id="entidad" name="estado" required   class="select2_group form-control textbox">
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
                                <option value="GR">GUERRERO</option> <option value="HG">HIDALGO</option> <option value="JC">JALISCO</option> <option value="MC">MEXICO</option> <option value="MN">MICHOACAN DE OCAMPO</option> <option value="MS">MORELOS</option> <option value="NT">NAYARIT</option> <option value="NL">NUEVO LEON</option> <option value="OC">OAXACA</option> <option value="PL">PUEBLA</option> <option value="QT">QUERETARO DE ARTEAGA</option> <option value="QR">QUINTANA ROO</option> <option value="SP">SAN LUIS POTOSI</option> <option value="SL">SINALOA</option> <option value="SR">SONORA</option> <option value="TC">TABASCO</option> <option value="TS">TAMAULIPAS</option> <option value="TL">TLAXCALA</option> <option value="VZ">VERACRUZ</option> <option value="YN">YUCATAN</option> <option value="ZS">ZACATECAS</option> <option value="NE">NACIDO EN EL EXTRANJERO</option>
                                </select>
                                  </div>
                      </div>
                     
                     
                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Telefono<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input id="telefono" type="text"pattern="([0-9]{13})|([0-9]{10})" class="form-control " data-error=": solo numero telefonico" required placeholder="" name="telefono">
                          <div  class="help-block with-errors"></div> </div>
                      </div>

                       <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-4 col-sm-3 col-xs-12 " >Fecha nacimiento<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input id="fechaNacimiento" type="date"  onmouseout="validarFecha(event,this)"  data-error="fecha invalido" pattern="" data-error="fecha invalida" maxlength="50" class="form-control" required="" placeholder="Fecha" name="fechaNacimiento">
                                 <div  class="help-block with-errors"></div>
                              </div> 
                      </div>  
                      

                      <div class="item form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Curp<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" id="curp" onkeyup="mayusculas(event, this)" onblur="validarCurps()" tidata-error=": el formato debe ser alfanumerico con 18 digitos"    maxlength="18" pattern=""class="form-control  text-uppercase"  required placeholder="curp" name="curp">
                          <div  class="help-block with-errors"></div> </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Sexo<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                       <select required id="sexo" onkeyup="validarCurps()" onblur="validarCurps()" name="sexo"  class="select2_group form-control">
                             <option value="">- Seleccione -</option> 
                             <option value="masculino">masculino</option> 
                             <option value="femenino">femenino</option>   
                          </select>

                        </div>
                      </div>

                  
                  <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Genero<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                       <select novalidate id="genero" onkeyup="validarCurps()" onblur="validarCurps()" name="genero"  class="select2_group form-control">
                             <option value="">- Seleccione -</option> 
                             <option value="lesbico">Lésbico</option> 
                             <option value="gay">Gay</option>   
                             <option value="bisexual">Bisexual</option>   
                             <option value="transexual">Transexual</option>   
                             <option value="Transgenero">Transgénero</option>   
                             <option value="Travesti">Travesti </option>   
                             <option value="Intersexual">Intersexual </option>
                             <option value="Ninguno">Ninguno </option>
                          </select>

                        </div>
                      </div>

                <!--   <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Municipio<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input onkeyup="mayusculas(event, this)" type="text" data-error=":  solo letras de maximo 50 caracter" pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="50" minlength="3"  class="form-control  text-uppercase"  required placeholder="" name="municipio">

                        </div>
                      </div> -->

             
                   
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Codigo postal<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                       <input id="codigoPostal" type="text" data-error="solo numeros" pattern="[0-9 ]+"  onmouseout="consumirCodigoPostal(this)" maxlength="10" minlength="1"  class="form-control  text-uppercase"  required placeholder="" name="codigoPostal">
                       <div  class="help-block with-errors"></div>
                          </div></div>

                         
                 
   
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                                    <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Discapacidad<span class="required">*</span></label>
                                    </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select required id="discapacidad" name="discapacidad"  data-error="solo numeros" class="select2_group form-control">
                                            <option value="">- Seleccione -</option> 
                                            <option value="sensorial">Discapacidades sensoriales y de la comunicación</option> 
                                            <option value="motrices"> Discapacidades motrices</option>   
                                            <option value="mental"> Discapacidades mentales</option>   
                                            <option value="multiples"> Discapacidades multiples </option>   
                                            <option value="ninguno"> Ninguno </option>   
                                           
                                    </select>

                                        </div>
                           </div>
                 <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Municipio<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input onkeyup="mayusculas(event, this)" id="municipio" type="text" data-error=":  solo letras de maximo 50 caracter" pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="50" minlength="3"  class="form-control  text-uppercase"  required placeholder="" name="municipio">

                        </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Etnia</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                       <select  novalidate id="etnia"  name="etnia"  class="select2_group form-control">
                             <option value="">- Seleccione -</option> 
                             <option value="MIXTECO">MIXTECO</option> 
                             <option value="ZAPOTECO">ZAPOTECO</option>   
                             <option value="AMUZGOS">AMUZGOS</option>   
                             <option value="CHATINO">CHATINO</option>   
                             <option value="CHINANTECOS">CHINANTECOS</option>   
                             <option value="CHOCHOL">CHOCHOL </option>   
                             <option value="CHONTALES">CHONTALES </option>
                             <option value="CUICATECOS">CUICATECOS </option>
                             <option value="HUAVES">HUAVES </option>
                             <option value="IXCATECOS">IXCATECOS </option>
                             <option value="MAZATECOS ">MAZATECOS </option>
                             <option value="MIXE">MIXE </option>
                             <option value="NAHUA">NAHUA </option>
                             <option value="TRIQUI">TRIQUI </option>
                             <option value="ZOQUES">ZOQUES </option>
                             <option value="CHOCHOLTECOS">CHOCHOLTECOS </option>
                             <option value="TACUATES">TACUATES </option>
                             <option value="AFROMEXICANO">AFROMEXICANO </option>
                             <option value="AFROMESTIZOS">AFROMESTIZOS </option>
                             <option value="TZOTZILES">TZOTZILES </option>
                             <option value="POPOLOCA">POPOLOCA </option>
                             <option value="NINGUNO">NINGUNO </option>
                          </select>
                        </div>
                        
                      </div>        
                    
                      

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Colonia<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" onkeyup="mayusculas(event, this)" id="colonia" data-error=":  solo letras de maximo 50 caracter" pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="50" minlength="3"  class="form-control  text-uppercase"  required placeholder="" name="colonia">
                        </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Idioma/lengua</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                        <input  id="idioma" onkeyup="mayusculas(event, this)"  type="text" data-error=":  solo letras de maximo 50 caracter"  pattern="[a-zA-ZáéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="50" minlength="3"  class="form-control  text-uppercase"  required placeholder="" name="idioma">
                         </div>
                      </div>

                     <div id="divFamiliar" class="form-group col-md-7 col-sm-6 col-xs-12 form-group ">
                                    <h4> <label class="control-label col-md- col-sm-3 col-xs-12 ">Tipo de parentesco<span class="required">*</span></label>
                                    </h4> <div class="col-md-8 col-sm-8 col-xs-12">

                                    <select required id="parentesco" name="parentesco"  class="select2_group form-control">
                                            <option value="NINGUNO">- Seleccione -</option> 
                                            <option value="HIJO">Hijo</option> 
                                            <option value="HIJA">Hija</option> 
                                            <option value="PAPÁ">Papá</option>   
                                            <option value="MAMÁ">Mamá</option>   
                                            <option value="ABUELO">Abuelo</option>   
                                            <option value="ABUELA">Abuela</option>   
                                            <option value="NIETO">Nieto</option>   
                                            <option value="NIETA">Nieta</option>   
                                            <option value="CUÑADA">Cuñada</option>   
                                            <option value="CUÑADO">Cuñado</option>   
                                    </select>

                                        </div>
                      </div>
                     
                   
                      
                      <input type="hidden"   id="id_contraparte" name="id_contraparte" class="form-control  text-uppercase"   placeholder="" >
                
                      <input type="hidden"  id="id_expediente_contraparte" name="id_expediente" value="<?php echo $_GET['id_expediente']?>"class="form-control  text-uppercase"   placeholder="" >
                
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						   <button class="btn btn-primary btn btn-info btn-lg" type="reset">Limpiar</button>
						   <input id ="enviarForm" type ="button" onclick="registrarContraparte()" class="btn btn-succes btn btn-success btn-lg" value="Guardar"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>


    <!-- 
    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script> -->
<!--     <script src="../../recursos/js/custom.min.js"></script> -->
    <script src="../../recursos/js/curp.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>
<!-- Google Analytics -->
<script>

$('#myform').validator()
//$("#divFamiliar").hide();



</script>