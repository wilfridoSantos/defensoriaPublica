<?php
 //include_once( '../../controlador/juzgado/actividad_juzgado.php');
 include_once( '../../controlador/defensor/controladorListaDef.php');
 //print_r($contenido);
/*  foreach($listaDef as $obj=>$valores){
    // echo $obj."fsdfwegfwefwefwef";  
    //print_r($valores['id_juzgado']);

      // echo ' <optgroup label="'.$obj.'">';
         echo '<option value='.$valores['nombre'].'>'.$valores['nombre'].'</option> ';
        //echo  '</optgroup>'; */
 
?>
   <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
   
     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><label class="control-label col-md-4 col-sm-3 col-xs-12 " >asignar Expediente</label></h1>
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
                    <form  class="" action ="../../controlador/expediente/registrarExpediente.php?tipo=html" object="defensor" method="post">

                    
                      
                     <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Curp de usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="curp" id="curp" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-horizontal form-label-left">                     <div class="form-group ">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue">Materia <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="materia" id="materia" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     


                       <div class="form-group  ">
                        <h4><label class="control-label col-md-3 col-sm-3 col-xs-12 ">adscripcion</label>
                       </h4> <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="defensor"  class="select2_group form-control">
                              <?php
                               // $defensormateria=json_decode($contenido);
                             
                               foreach($listaDef as $obj=>$valores){
                                    
                                     echo '<option value='.$valores['id_personal'].'>'.$valores['nombre']." ".$valores['ap_paterno']." ".$valores['ap_materno'].'</option> ';
                             
                             }
                                  ?>
                           
                          </select>
                        </div>
                      </div>
                    
                      
                     
                    

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                         
						   <input id="asignarAdscripcion" type ="submit" class="btn btn-succes btn btn-success btn-lg" value="cambiar"/>
                        <!--   <button type="submit" class="btn btn-success">Submit</button> -->
                        </div>
                      </div>
                      </div>

                    </form>
                  </div>
                </div>

