<script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>
<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>

<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<script src="../../recursos/js/coordinador/funcionesGeneralesPDF.js"></script>

<script src="../../recursos/js/coordinador/pdfActividadesGByDefPeriodo.js"></script>
<script src="../../recursos/js/coordinador/pdfActividadesGPeriodo.js"></script>

<script src="../../recursos/js/coordinador/pdfActividadesGByDefCompleto.js"></script>
<script src="../../recursos/js/coordinador/pdfActividadesGCompleto.js"></script>



<link href="../../recursos/css/custom.css" rel="stylesheet" />
<script src="../../recursos/js/jquery-validator.js"></script>
<!-- <script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">
 -->
 <script>seleccionarUnDefensor(true)</script>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Generar informe general de actividades<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">         
                    <form id="myform" data-toggle="validator" class="form-horizontal form-label-left" novalidate="">
                        <div class="form-group col-md-12">
                            <label class="radio-inline">
                                <input type="radio" id="inputRadio1" name="optradio" >Informe general con periodo de tiempo
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="inputRadio2" name="optradio" checked="checked">Informe general completo
                            </label>                            
                        </div>
                        
                        <div class="form-group col-md-12" id="checkDefensor" name="checkDefensor">
                            
                            <div class="form-group col-md-4">
                                <label class="form-check-label" >Defensor en especifico? 
                                    <input type="checkbox" checked id="checkId" name="checkDefensor" class="form-check-input" onchange="seleccionarUnDefensor(this.checked)" >                          
                                </label>
                            </div>
                            <div class="form-group col-md-6" id="idCheckDefensor" name="idCheckDefensor" style="display:none;">
                                <div class="form-inline">
                                    <label class="form-inline col-md-4" for="project">Eliga un defensor<span class="required">*</span></label>
                                        <input  class="form-inline col-md-6" data-error="Seleccione un defensor" type="text"  id="project"  required onchange="estadoInput(this.value)">                                                                                              
                                        <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-horizontal form-label-left">
                                    <div class="form-group ">                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <table required="" id="tablaAsinacionExpedienteusuario" class="table table-striped ">
                                                <tbody required="" id="usuarioSeleccionados" style="height: 200px; overflow: auto;" class=" ui-widget-content"></tbody></table>
                                            
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>                    
                                <input type="text" name="idDefensor" id="idDefensor" style="display:none;" />       
                            </div>
                        </div> 
                        <div class="form-group" style="display:none;" id="divPeriodo">
                            <div class="form-group" >PERIODO*<br>
                                <label class="form-check-label" > Fecha inicial*
                                    <input type="date" id="inputInicio"  required="required"  data-error="Debe ser menor a la fecha Final." name="inputInicio" onblur="myFunctionDate(this)" onkeyup="myFunctionDate()" data-error="ingresa fecha menor a la final" step="1">                                                      
                                </label>
                                <br>
                                <label class="form-check-label" > Fecha  final*   
                                     <input type="date" id="inputFinal" name="inputFinal" required="required"  data-error="Debe ser mayor a la fecha Inicial." onblur="myFunctionDate(this)" onkeyup="myFunctionDate()" data-error="ingresa fecha menor a la final" step="1">
                                    <div id="labelFinal2" class='block-help with-errors'></div>
                                    <div id="labelFinal" class='block-help with-errors'></div>
                                </label>
                            </div>                            
                        </div>                                              
                    </form>
                    <div class="row no-print">
						             <div class="col-xs-12">
						               <button class="btn btn-success pull-right" id="botonDesc" disabled onclick="generarPDFActividadesGeneral();" style="margin-right: 5px;">
						<i class="fa fa-download"></i> Generar PDF</button>
					             </div>
						           </div>
                  </div>
                </div>
              </div>

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
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div> 
<script>

$('#myform').validator()

</script>
