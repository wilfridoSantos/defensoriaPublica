<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 include_once( '../../controlador/defensor/controladorListaDef.php');
 
 
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
    
    asignarDefensor
}</script>
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Crear Expediente</label></h1>
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
                    <form  id="myform"  data-toggle="validator" role="form" class="" action ="../../controlador/expediente/registrarExpediente.php?tipo=html" object="defensor" method="post">

                    
                      
                     <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" minlength="18" maxlength="18" name="curp" data-error="debe ser un formato de curp correcto" id="curp" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required="required" class="form-control col-md-7 col-xs-12">
                          <div  class="help-block with-errors"></div></div>
                      </div>
                      
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Número de expediente<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="expediente" id="expediente"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
        

                     <div class="form-group">
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
                          </div></div>


                       <div class="form-group  ">
                        <h4><label class="control-label col-md-3 col-sm-3 col-xs-12 ">Defensor <span class="required">*</span></label>
                       </h4> <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required=""  name="defensor" id="asignarDefensor" class="select2_group form-control">
                             <option > --Seleccione una opción--</option>
                              <?php
                               // $defensormateria=json_decode($contenido);
                             
                              
                                  ?>
                           
                          </select>
                        </div>
                      </div>
                    
                      
                     
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						   <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Cambiar"/>
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

    <script>

$('#myform').validator()
</script>