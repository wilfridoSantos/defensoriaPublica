<?php
session_start();
$idpersonal=$_SESSION['personal'];
//print_r($idpersonal[0]['id_personal']);
//include '../../controlador/defensor/controladorListarExp.php?idPersonal='.$idpersonal[0]['id_personal'];
//print_r($idpersonal);
//print_r($misExpedietnesDefensor);
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo Coordinador General</title>
      <script src="../../recursos/js/main.js"></script>
      <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
      <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../recursos/js/main.js"></script><!-- 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->


      <script src="../../recursos/js/defensor/atendiendoDefensor.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>

      <script>
      cargarMisExpedientes(<?php echo $idpersonal[0]['id_personal']?>);

      </script>

<body onload="">
<div class="x_content">
        <h3 ><b>
          <center>
          LISTA EXPEDIENTES
          </center>
          </b>
        </h3>
       <div class="form-group">
                                <div class="left" style="width:45%;">                                     
                                  <input type="text" id="columna1" onkeyup="buscarXPrimerCampo()" class="form-control" placeholder="Nombre Defensor...">                                                                                                
                                </div>
                              
                            </div>
        
      </div>



      




<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>LISTA DE EXPEDIENTES</h2>
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
                  
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr > 
                        <th >    Num. Expediente     </th>
                        <th >    Estado   </th>
                        <th >    Acción a implementar   </th>
                        <th >    Observaciones     </th>
                        </thead>
                      <tbody id='tebody' >
                      
                                                                                                                                                                                                  
                    
                      </tbody>
                    </table>
                    <div id="miUsuarioServicio" class="x_content" title="infomación">
                    <table  class="table table-hover">
                      <thead>
                        
                      </thead>
                      <tbody id="datosUsuarioServicio">
                        
                      </tbody>
                    </table>

                  </div>
                 
                    </div></div>
                     
                    </div>
					
					
                  </div>
                </div>
              </div>





     
     </body>
          </html>









          
<script>	$("#miUsuarioServicio").hide();</script>
















              <script>
					// $('#miUsuarioServicio').dataTable();</script>
