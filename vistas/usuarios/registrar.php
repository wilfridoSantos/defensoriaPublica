<?php 
  include '../../controlador/juzgado/actividad_juzgado.php';
?>

<script>


function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.php");
      }

      /* $.ajax({
			url: "https://www.curp-gratis.com.mx/consulta-curp" ,
			type: "POST",
			data: "strCurp=SALW941012HOCNPL04",
			beforeSend: function () {
				
			},
			success: function (data) {

			 alert(data);
      }
    }); */

      
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
                            <input type="text"  pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ ]+"  maxlength="40" minlength="4" autofocus="autofocus"   required class="form-control text-uppercase" data-error="se letras no máximo de 40 ni mánimo de 4" placeholder="Nombre" name="nombre">
                            <div  class="help-block with-errors"></div></div>
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
                            <input type="text" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+" data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4"  required class="form-control  text-uppercase" placeholder="Apellido Paterno" name="apellido_paterno">
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
                            <input type="text" pattern="[a-zA-ZéėíóúūñÁÉÍÓÚÜÑ]+"  data-error="solo letras no máximo de 40 ni mánimo de 4" autofocus="autofocus" maxlength="40" minlength="4" required class="form-control  text-uppercase" placeholder="Apellido Materno" name="apellido_materno">
                           </div>
                       </div> 
                    <!--    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="emails" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

                       <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Teléfono<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12"  >
                          <input type="tel" pattern="(?[0-9]{3})([0-9]{10})"  maxlength="13" minlength="10" class="form-control " data-error=" solo numero telefonico" required placeholder="Telefono" name="telefono">
                          <div  class="help-block with-errors"/></div>
                      </div>

                      <div class=" form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label for="inputEmail" class="control-label col-md-4 col-sm-3 col-xs-12 " >Email<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input type="text" title"correo invalido" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$" data-error="correo invalido" maxlength="50" class="form-control" required="" placeholder="Email" name="email">
                              <div  class="help-block with-errors"></div>  </div> 
                      </div>  

            

                     <div class="item form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Curp<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" tidata-error=": el formato debe ser alfanumerico con 18 digitos" maxlength="18" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"class="form-control  text-uppercase"  required placeholder="curp" name="curp">
                          <div  class="help-block with-errors"></div> </div>
                      </div>
                       <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Adscripció  n</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <select name="adscripcion"  class="select2_group form-control">
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
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">Puesto</label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <select name="puesto"  class="select2_group form-control">
                             <option value="4">defensor</option> 
                             <option value="2">coordinador</option>   
                          </select>
                        </div>
                      </div>
                    
                     
                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Género<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">

                       <select required name="genero"  class="select2_group form-control">
                             <option value="masculino">masculino</option> 
                             <option value="masculino">femenino</option>   
                          </select>

                          <div id="gender" required class="btn-group" data-toggle="buttons">
                           
                           </div>
                        </div>
                      </div>

               


                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Contraseña<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" data-error="debe contener al menos  una mayúscula y número con minimo 8 carácter"  min="8" max="20"  class="form-control"  required placeholder="contraseña" name="password">
                          <div  class="help-block with-errors"></div>
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
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="../../recursos/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../recursos/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../recursos/vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../../recursos/vendors/validator/validator.js"></script>
 -->
    <!-- Custom Theme Scripts -->
    <script src="../../recursos/js/custom.min.js"></script>
    <script src="../../recursos/js/jquery-validator.js"></script>
<!-- Google Analytics -->
<script>
$('#myform').validator()
/* ar validator = new FormValidator('example_form', [{
  /*   name: 'req',
    display: 'required',
    rules: 'required'
}, {
    name: 'alphanumeric',
    rules: 'alpha_numeric'
}, {
    name: 'password',
    rules: 'required'
}, {
    name: 'password_confirm',
    display: 'password confirmation',
    rules: 'required|matches[password]'
},  {
    name: 'email',
    rules: 'valid_email',
    depends: function() {
        return Math.random() > .5;
    }
}, {
    name: 'minlength',
    display: 'min length',
    rules: 'min_length[8]'
}], function(errors, event) {
    if (errors.length > 0) {
        // Show the errors
    }
});

 */

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-23581568-13', 'auto');
ga('send', 'pageview');

</script>
	
  
