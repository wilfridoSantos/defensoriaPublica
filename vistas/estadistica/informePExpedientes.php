
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
 	<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>

<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>
<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>

<link href="../../recursos/css/custom.css" rel="stylesheet" />

<script src="../../recursos/js/jquery-validator.js"></script>
<script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Generar informe parcial de expedientes<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <label class="control-label " style="padding-left:300px;" >PERIODO 
                        </label><br>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputInicio"  required="required" class="form-control controlFecha"  data-error="Debe ser menor a la fecha Final." name="inputInicio" onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" data-error="ingresa fecha menor a la final" step="1">                                                   
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha Final <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputFinal" name="inputFinal" required="required" class="form-control controlFecha" data-error="Debe ser mayor a la fecha Inicial." onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" data-error="ingresa fecha menor a la final" step="1">
                          <div id="labelFinal" class='block-help with-errors'></div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">                        
                                <select name="datatable-responsive_length" aria-controls="datatable-responsive" class="form-control input-sm">
                                    <option value="">Seleccione un sistema</option>
                                    <option value="T">Tradicional</option>
                                    <option value="O">Acusatorio y Oral</option>
                                    <option value="J">Justicia para Adolecentes</option>
                                    <option value="ALL">Todos</option>
                                </select>
                    </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Atributos a solicitar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                        
                                <select name="datatable-responsive_length" multiple="multiple" aria-controls="datatable-responsive" class="form-control input-sm">                                    
                                    <option value="T">Sexo</option>
                                    <option value="O">Genero</option>
                                    <option value="J">Edad</option>
                                    <option value="ALL">Etnia</option>
                                    <option value="ALL">Idioma o Lengua</option>
                                    <option value="ALL">Discapacidad</option>                                    
                                </select>
                    </div>
                      </div>
                    
                    </form>
                    <div class="row no-print">
						             <div class="col-xs-12">
						               <button class="btn btn-success pull-right" id="botonDesc" disabled onclick="generarPDFActividades();" style="margin-right: 5px;">
						<i class="fa fa-download"></i> Generar PDF</button>
					             </div>
						           </div>
                  </div>
                </div>
              </div>

<!--
<div class="col-md-12 col-sm-12 col-xs-12" id="tablaPanel">
    <div class="x_panel">
        <div class="x_title">
            <h2><b>Lista de Actividades </b></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="dataTables_length" id="datatable-responsive_length">
                            <label>Mostrar
                                <select name="datatable-responsive_length" aria-controls="datatable-responsive" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> Entradas</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
                            <select id="filtro1" style="width:150px;" class="form-control" name="users" onchange="filtroActividades(this.value)">                
                    <option value="" >Actividades</option>
                    <option value="1">Asesorias</option>
                    <option value="2">Audiencias</option>
                    <option value="3">Visitas carcelarias</option>
                    <option value="4" selected="selected">Todos</option>                                  \
                  </select></label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="datatable-responsive_filter" class="dataTables_filter">
                            <label>Buscar por Defensor:
                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable-responsive">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div id="dialogoV" class="ui-widget">
                    </div>
                </div>
                    <div class="col-sm-12">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                        style="width: 71px;" aria-label="Defensor: activate to sort column descending" aria-sort="ascending">Defensor</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                        rowspan="1" colspan="1" style="width: 70px;" aria-label="Usuario: activate to sort column ascending">Usuario</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 155px;" aria-label="Fecha registro: activate to sort column ascending">Fecha registro</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 66px;" aria-label="Observaciones: activate to sort column ascending">Observaciones</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 28px;" aria-label="Acciones: activate to sort column ascending">Acciones</th>
                                    </tr>
                            </thead>
                            <tbody id='resultadoInforme' >

                            </tbody>
                        </table>
                     
                    </div>

      
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
                                      
<div id="dialogoI">
                            <div id='mapa'>                      
                            </div>             
                            <div id="pano" style="position: relative;">
                                
                            </div>

                        </div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle"><b> FOTO VISITA CARCELARÍA </b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div id="miActividad" class="table-responsive x_content" title="infomación"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> 
      </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="exampleModalLongObs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitleObs"><b> OBSERVACIONES </b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div id="miActividadObs" class="table-responsive x_content" title="infomación"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> 
      </div>
    </div>
  </div>
</div> 
-->