<?php
include '../../controlador/defensor/controladorListarExp.php';

 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
<!-- Bootstrap -->

    <title>Modulo Coordinador General</title>

    <script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
 	<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>
    <script src="../../recursos/js/main.js"></script>
    <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
    <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
    <link href="../../recursos/css/style.css" rel="stylesheet"/>
    <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css"> 
      
    <script>showUser(3)</script>
    
<body>
      <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><b>Lista de Expedientes </b></h2>
                                      
                      
                      <div align="right">
                            <label>Busqueda
                              <input type="text" id="buscarCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor..." aria-controls="datatable-responsive">
                                
                            </label>
                        </div>
                      
                   
                 
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
           
            <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    
                    <div class="col-sm-3">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
                            <select id="filtro1" style="width:150px;" class="form-control"  name="users" onchange="showUser(this.value)" >                
                    <option value="">Por estado</option>
                    <option value="1">Activos</option>
                    <option value="2">Inactivos</option>
                    <option value="3" selected="selected">Todos</option>                                  \
                  </select></label>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 2
                            <select style="width:230px;" id="filtro2" class="form-control"  name="users" onchange="showMateria(this.value)" >                
                    <option value="">Materia</option>
                    <option value="penal">Penal</option>
                    <option value="civil">Civil</option>
                    <option value="familiar">Familiar</option>
                    <option value="agrario">Agrario</option>
                    <option value="mercantil">Mercantil</option>                                  
                    <option value="amparo">Amparos</option>
                  </select></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">                              
                        <button id = "botonDesc" class="btn btn-dark" onclick="descargarPDF();" style="margin-left: 50px;">
						<i class="fa fa-download"></i> Generar PDF</button>
                        </div>
                    </div>
                </div>
                <div class="row">      
                    <div class="col-sm-12">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                        style="width: 71px;" aria-label="Defensor: activate to sort column descending" aria-sort="ascending">NUM EXPEDIENTE</th>
                                    <th width="100px" class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                        rowspan="1" colspan="1" style="width: 70px;" aria-label="Usuario: activate to sort column ascending">MATERIA</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 155px;" aria-label="Fecha registro: activate to sort column ascending">FECHA DE REGISTRO</th>
                                    <!-- <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 155px;" aria-label="Estado: activate to sort column ascending">ESTADO EXP.</th> -->
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 66px;" aria-label="Observaciones: activate to sort column ascending">OBSERVACIONES</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 28px;" aria-label="Acciones: activate to sort column ascending">ACCIONES</th>
                                    </tr>
                            </thead>
                            <tbody id="tebody" >
      

                            </tbody>
                        </table>
                    </div>
                </div>

               
            </div>
        </div>




    </div>
</div>
            <div id="dialogoCambio" > </div>
            <div id="dialogoPreguntas" style="display:none;"> </div>
            <div id="dialogoBaja" style="display:none;"> </div>


  <div class="modal fade" id="modalVisualizarExpediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">información del expediente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div id="miFinalizar" class="table-responsive x_content" title="infomación">
                                  <!--  <table id="exampleuser" lass="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  --> 
                                    
                                    
                                          </div>
                                         


 
               
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <!-- <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Seguimiento</a>
                        </li> -->
                         <li role="presentation" class="active"><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Tarjeta Informativa</a>
                        </li> 
                        <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Resumen</a>
                        </li> -->
<!--                         <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
 -->                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <!-- <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        </div> -->
                        <!-- <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         --><div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="home-tab">
                            <div   style="word-wrap: break-word;">
                                
                            <address id="id_tarjetaInformativa" >
                              Número de expediente: <p id="numExpediente"> </p>
                              Delito:<p id="delito"></p>
                              Esuario del servicio(s):<p id="usuarioServicio"></p>
                              Involucrado(s):<p id="involucrado"></p>
                              Situación actual:<p id="situacionActual"></p>
                              Acción a implementar:<p id="accionImplementar"></p>
                              Situación anterior:<p id="situacionAnterior"></p>
                              Acción a implementar:<p id="accionImplementarAnterior"></p>
                             
                              </div>

                            </address>
                         
                        </div>
                      </div>
                    </div>

                  </div>
            
            








                                             <!--  <div class="form-group"> 
                                                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3"> 
                                                  <input class="btn btn-succes btn btn-success btn-lg" type="button" name="botonUpdate" onclick="finalizarExpedinte()" id="botonUpdate" value="finalizar"></input>  
                                                  </div> 
                                                  </div> -->
                                       
                                          <div  id="EditarContraparte">
                                      
                                      </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                              </div>
                            </div>
                          </div>
                    </div> 
          </body>
          </html>
