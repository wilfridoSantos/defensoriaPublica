
<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<link href="../../recursos/css/custom.css" rel="stylesheet" />

<script src="../../recursos/js/jquery-validator.js"></script>

<script src="../../recursos/vendors/pdfmake/build/pdfmake.js"></script>
<script src="../../recursos/vendors/pdfmake/build/pdfmake.min.js"></script>
<script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
                  <div class="x_title">
                    <h2><b>Generar Informe de actividades<b></b></b></h2><b><b>
                    
                    <div class="clearfix"></div>
                  </b></b></div><b><b>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputInicio" required="required" class="form-control controlFecha" data-error="Debe ser menor a la fecha Final." name="inputInicio" onblur="myFunctionDate2(this,<?php echo $_GET['nue']?>)" onkeyup="myFunctionDate2(this,<?php echo $_GET['nue']?>)" step="1">                          
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha Final <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputFinal" name="inputFinal" required="required" class="form-control controlFecha" data-error="Debe ser mayor a la fecha Inicial." onblur="myFunctionDate2(this,<?php echo $_GET['nue']?>)" onkeyup="myFunctionDate2(this,<?php echo $_GET['nue']?>)" step="1">
                          <div id="labelFinal" class="block-help with-errors"></div>

                        </div>
                      </div>                                          
                    </form>
                  </div>
                </b></b></div>
    <div class="x_panel">
        <div class="x_title">
            <h2><b>Lista de Actividades por NUE</b></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
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
                            <tbody id='resultadoInformeByNue' >
                                <!-- <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">Airi</td>
                                    <td>Satou</td>
                                    <td>Accountant</td>
                                    <td style="">Tokyo</td>
                                    <td style="">33</td>

                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" tabindex="0">Angelica</td>
                                    <td>Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td style="">London</td>
                                    <td style="">47</td>
                                    
                                </tr>
                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">Ashton</td>
                                    <td>Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td style="">San Francisco</td>
                                    <td style="">66</td>
                              
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1" tabindex="0">Bradley</td>
                                    <td>Greer</td>
                                    <td>Software Engineer</td>
                                    <td style="">London</td>
                                    <td style="">41</td>
                                
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" tabindex="0">Brenden</td>
                                    <td>Wagner</td>
                                    <td>Software Engineer</td>
                                    <td style="">San Francisco</td>
                                    <td style="">28</td>
                                   
                                </tr>
                                 -->
                            </tbody>
                        </table>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="datatable-responsive_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
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