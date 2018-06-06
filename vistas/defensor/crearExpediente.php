<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 include_once( '../../controlador/defensor/controladorListaDef.php');
 
 
?><!-- 
   <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script> -->
   <script src="../../recursos/js/defensor/atendiendoDefensor.js"></script>
<script src="../../recursos/js/herramienta.js"></script>
 
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Crear Expediente</label></h1>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form  id="myform"  data-toggle="validator" role="form" class="" action ="../../controlador/expediente/registrarExpediente.php?tipo=html" object="defensor" method="post">

                    
                      
                     <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!-- <input type="text" value="{{curp}}"minlength="18" maxlength="18" name="curp" data-error="debe ser un formato de curp correcto" id="curp" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"   required="required" class="form-control col-md-7 col-xs-12">
                           --><input type="text" readonly value="{{curp}}"minlength="18" maxlength="18" name="curp" data-error="debe ser un formato de curp correcto" id="curp" pattern=""   required="required" class="form-control col-md-7 col-xs-12">
                          
                          <div  class="help-block with-errors"></div></div>
                      </div>
                      
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Número de expediente<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="expediente" id="expediente"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
        
<<<<<<< HEAD

                     <div class="form-group">
=======
                      <div class="form-horizontal form-label-left">   <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Estado Inicial<span class=""></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="estado" id="estado"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div></div>

                        <div class="form-horizontal form-label-left">   <div class="form-group ">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Acción a implementar<span class=""></span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="accionImplementar" id="accionImplementar"  class="form-control col-md-7 col-xs-12">
                         </div>
                      </div></div>

               
                          <input type="text" name="defensor" id="defensor" style="display:none;" value="<?php session_start(); echo $_SESSION['personal'][0]["id_personal"]?>"  class="form-control col-md-7 col-xs-12"/>
                          <input type="text" name="materia" id="materia" style="display:none;" value="<?php session_start(); echo $_SESSION['personal'][0]["materia"]?>"  class="form-control col-md-7 col-xs-12"/>
               
                  <!--    <div class="form-group">
>>>>>>> 7a163bc29d90b8ba8ea055e596c8ecaf3b37044e
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
<<<<<<< HEAD
                          </div></div>
=======
                          </div></div> -->
>>>>>>> 7a163bc29d90b8ba8ea055e596c8ecaf3b37044e


                      <!--  <div class="form-group  ">
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
                     -->
                      
                     
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
<<<<<<< HEAD
						   <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Cambiar"/>
=======
						   <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="Crear Expediente"/>
>>>>>>> 7a163bc29d90b8ba8ea055e596c8ecaf3b37044e
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

$('#myform').validator()
</script>