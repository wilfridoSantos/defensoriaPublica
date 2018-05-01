<?php 
  include '../../controlador/juzgado/actividad_juzgado.php';
?>

<script>

function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.php");
      }
      
</script>


     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >Registro de defensores</label></h1>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="agregarjuzado" onclick="agrega()"><h3><label class="control-label col-md-4 col-sm-3 col-xs-12 text-muted" >agregar Juzgado</label></h3></a>
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
                    <form  class="form-horizontal form-label-left" action ="../../controlador/defensor/registrar_Defensor.php?" object="defensor" method="post">

                        <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Nombre<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text"   pattern="[A-Za-z ]+"  required class="form-control text-uppercase" title=":se acepta solo letras y en mayusculas" placeholder="Nombre" name="nombre">
                          </div>
                       </div>

                       <div class="form-group  col-md-6 col-sm-6 col-xs-12 ">
                         <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Apellido Paterno<span class="required">*</span></label>
                         </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" pattern="[A-Za-z]+"  required class="form-control  text-uppercase" placeholder="Apellido Paterno" name="apellido_paterno">
                          </div>
                       </div>

                        <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4>  <label class="control-label col-md-4 col-sm-3 col-xs-1 " >Apellido Materno<span class="required">*</span></label>
                          </h4><div class="col-md-8 col-sm-9 col-xs-12">
                            <input type="text" pattern="[A-Za-z]+" required class="form-control  text-uppercase" placeholder="Apellido Materno" name="apellido_materno">
                           </div>
                       </div> 
                       
                       <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Telefono<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]{10}" class="form-control " title=": solo numero telefonico" required placeholder="Telefono" name="telefono">
                         </div>
                      </div>

                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                           <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >Email<span class="required">*</span></label>
                            </h4><div class="col-md-8 col-sm-9 col-xs-12">
                              <input type="email" class="form-control" required placeholder="Email" name="email">
                            </div>
                      </div>
                      
                     

                      <div class="form-group  col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 " >nup<span class="required">*</span></label>
                         </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]{5}"  min="5" class="form-control" required placeholder="nup" name="nup">
                         </div>
                      </div>

                      <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 "> nue<span class="required">*</span></label>
                        </h4><div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" pattern="[0-9]{5}" min="5" class="form-control" required  placeholder="nue" name="nue">
                        </div>
                      </div>


                     <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12  text-uppercase">Curp<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-9 col-xs-12">
                          <input type="text" title=": el formato debe ser alfanumerico con 18 digitos" pattern="([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)"class="form-control  text-uppercase"  required placeholder="curp" name="curp">
                        </div>
                      </div>


                       <div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                        <h4><label class="control-label col-md-4 col-sm-3 col-xs-12 ">adscripcion</label>
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
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 ">Genero<span class="required">*</span></label>
                       </h4> <div class="col-md-8 col-sm-8 col-xs-12">
                          <div id="gender" required class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="genero" required value="masculino" data-parsley-multiple="gender" type="radio"> masculino
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="genero" required value="femenino" data-parsley-multiple="gender" type="radio"> femenino
                            </label>
                          </div>
                        </div>
                      </div>
                      
                      <!--<div class="form-group col-md-6 col-sm-6 col-xs-12 form-group ">
                       <h4> <label class="control-label col-md-4 col-sm-3 col-xs-12 text-muted">Cargo <span class="required">*</span>
                        </label></h4>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required" name="cargo" type="text">
                        </div>
                      </div>-->

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary btn btn-info btn-lg">Cancel</button>
						   <button class="btn btn-primary btn btn-info btn-lg" type="reset">Reset</button>
						   <input type ="submit" class="btn btn-succes btn btn-success btn-lg" value="guardar"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

