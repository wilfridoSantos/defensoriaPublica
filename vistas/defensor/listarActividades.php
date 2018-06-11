<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<link href="../../recursos/css/custom.css" rel="stylesheet" />

<script src="../../recursos/js/jquery-validator.js"></script><!-- 
<script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script> -->
<script type="text/javascript" src="../../recursos/js/jquery-ui.1.12.1.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">

<script>filtroActividades(4);</script>
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
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
                            <select id="filtro1" style="width:150px;" class="form-control" name="users" onchange="filtroActividades(this.value)">                
                    <option value="">Actividades</option>
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
         
                </div>
                    <div class="col-sm-12">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                            <thead>
                                <tr role="row">                                   
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                        rowspan="1" colspan="1" style="width: 70px;" aria-label="Usuario: activate to sort column ascending">Usuario</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 155px;" aria-label="Fecha registro: activate to sort column ascending">Fecha registro</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 66px;" aria-label="Observaciones: activate to sort column ascending">Observaciones</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1"
                                        colspan="1" style="width: 28px;" aria-label="TIPO DE SERVICIO: activate to sort column ascending">Actividad</th>
                                    </tr>
                            </thead>
                            <tbody id='resultadoInforme' >

                            </tbody>
                        </table>
                     
                    </div>

      
                </div>
         
            </div>
        </div>
    </div>
</div>
                                      
<div id="dialogoV">                                                                
</div>


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Usuario(s)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div id="    " class="table-responsive x_content" title="infomación">


                  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div> 