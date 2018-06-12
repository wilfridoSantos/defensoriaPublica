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
                    <div class="col-sm-2">
                        <div class="dataTables_length" id="datatable-responsive_length">
                            <label># Entradas
                                <select name="datatable-responsive_length" aria-controls="datatable-responsive" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select></label>
                        </div>
                    </div>
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
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 155px;" aria-label="Estado: activate to sort column ascending">ESTADO EXP.</th>
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

                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="datatable-responsive_info1" role="status" aria-live="polite">
                     
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-responsive_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" id="datatable-responsive_previous">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="0" tabindex="0">Previous</a>
                                </li>
                                <li class="paginate_button active">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="1" tabindex="0">1</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="2" tabindex="0">2</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="3" tabindex="0">3</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="4" tabindex="0">4</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="5" tabindex="0">5</a>
                                </li>
                                <li class="paginate_button ">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="6" tabindex="0">6</a>
                                </li>
                                <li class="paginate_button next" id="datatable-responsive_next">
                                    <a href="#" aria-controls="datatable-responsive" data-dt-idx="7" tabindex="0">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <div id="dialogoCambio" > </div>
            <div id="dialogoPreguntas" style="display:none;"> </div>
            <div id="dialogoBaja" style="display:none;"> </div>

          </body>
          </html>
