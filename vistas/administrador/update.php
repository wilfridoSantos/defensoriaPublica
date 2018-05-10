<?php 
  include '../../controlador/defensor/controlDefensor.php';
  $defensor=json_decode($defensorZ);    
  foreach($defensor as $obj){
    $nombreDef = $obj->nombre;
    $ap_p = $obj->ap_paterno;
    $ap_m = $obj->ap_materno;
    $correo = $obj->corre_electronico;
    $tel = $obj->telefono;
    $nup = $obj->nup;
    $nue = $obj->nue;
    $curp = $obj->curp;
    $cedula = $obj->cedula_profesional;
    $juzgado = $obj->juzgado;
  }  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>ACTUALIZAR DEFENSOR</title>
<script src="../../recursos/js/main.js"></script>
</head>
<body>
<script>

function agrega(){
			 $('#menuContainer').load("coordinadorRegistrarJuzgado.html");
			 }
</script>
 
     <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Actualizar datos de defensor</h2>
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#" id="agregarjuzado" onclick="agrega()">Editar Juzgado</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br /><!--  action="agregarDefensor" -->
<!-- class="form-horizontal form-label-left input_mask"  th:action="@{/defensor/agregarDefensor}" th:object="${defensor}" -->
                    
                  <form  action ="../../controlador/defensor/ctrlUpdate.php"  method="post">
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputNombre" placeholder="Nombre" name="nombre"
                         value="<?php
                                  echo $nombreDef;
                                ?>">NOMBRE
                        </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess3" placeholder="apellido Paterno" name="apellido_paterno"
                        value="<?php
                                  echo $ap_p;
                                ?>">APELLIDO PATERNO
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccessmaterno" placeholder="apellido materno" name="apellido_materno"
                        value="<?php
                                  echo $ap_m;
                                ?>">APELLIDO MATERNO
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" name="email"
                        
                        value="<?php
                                  echo $correo;
                                ?>">CORREO ELECTRONICO
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Telefono" name="telefono"
                        value="<?php
                                  echo $tel;
                                ?>">NUMERO TELEFONICO
                       
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="nup" name="nup"
                        value="<?php
                                  echo $nup;
                                ?>">NUMERO NUP
                        
                      </div>
                      
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="nue" name="nue"
                        value="<?php
                                  echo $nue;
                                ?>">NUMERO NUE
                        
                      </div>

                                           <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="curp" name="curp"
                        value="<?php
                                  echo $curp;
                                ?>">CURP
                      
                      </div>


          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Cedula<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control"  placeholder="numero cedula" name="num_cedula"
                          value="<?php
                                  echo $cedula;
                                ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Juzgado <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="date-picker form-control col-md-7 col-xs-12" required="required"  placeholder="juzgado" name="juzgado" type="text"
                          value="<?php
                                  echo $juzgado;
                                ?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
<!--                           <input type="submit"name="cancelar" class="btn btn-primary" value="Cancelar"></button>
 -->						              <input class="btn btn-primary" type="submit" name="update" 
                              value="Actualizar Datos"></input>
						   
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>

                    
                  </div>
                  </form>
                </div>

</body>
</html>
