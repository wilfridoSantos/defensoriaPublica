<script src="../../recursos/js/jquery-ui.1.12.1.js"></script>

<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>

<!-- <script src="../../recursos/js/herramienta.js"></script> 
 -->

<link href="../../recursos/css/custom.css" rel="stylesheet" />
<script src="../../recursos/js/jquery-validator.js"></script>
<!-- <script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">
 -->
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Consultas<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">         
                    <form id="myform" data-toggle="validator" class="form-horizontal form-label-left" novalidate="">
                        <div class="form-group col-md-12">
                            <label class="radio-inline">
                                <input type="radio" id="radioPeriodo" onchange="seleccionarUnDefensorExpediente(this.checked)" checked="checked" name="optradio" >Informe general con periodo de tiempo
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="radioCompleto" name="optradio" onchange="seleccionarUnDefensorExpediente(this.checked)" >Informe general completo
                            </label>   
                            <!-- <label class="form-check-label" >Defensor en especifico? 
                                    <input type="checkbox" checked id="checkId" name="checkDefensor" class="form-check-input" onchange="seleccionarUnDefensorExpediente(this.checked)" >                          
                                </label>  -->                        
                        </div>
                        <div class="form-group col-md-3">
                                 <label class="form-check-label" >Defensor en especifico? 
                                    <input type="checkbox" checked id="checkId" name="checkDefensor" class="form-check-input" onchange="seleccionarUnDefensorExpediente(this.checked)" >                          
                                </label> 
                            </div>
                        <!-- <div class="form-group col-md-2" id="checkDefensor" name="checkDefensor"> -->
                            
                            <div class="form-group col-md-2"  id="checkSistema">
                                <label class="form-check-label" >Sistema
                                <select id="sistema" name="sitema" class="select2_group form-control textbox">
                                <option value="NINGUNO">- Seleccione -</option> 
                                <option value="ORAL">Oral</option>
                                <option value="TRADICIONAL">Tradicional</option>
                                <option value="NINGUNO">Ninguno</option>
                               
                            </select>
                           </div>  </label>
                            <!-- </div> -->
                            <div class="form-group col-md-2"  id="checkMateria">
                                <label class="form-check-label" >Materia
                                <select id="materia" name="materia" class="select2_group form-control textbox">
                                <option value="NINGUNO">- Seleccione -</option> 
                                <option value="CIVIL">Civil</option>
                                <option value="PENAL">Penal</option>
                                <option value="FAMILAR">Familiar</option>
                                <option value="EJECUCION">Ejecución de sanciones</option>
                                <option value="ADOLESCENTE">Adolescente</option>
                                <option value="NINGUNO">Ninguno</option>
                               
                            </select>  </label>
                            </div>


                            <div class="form-group col-md-4"  id="checkRegion">
                                <label class="form-check-label" >Región
                                <select id="region" name="region" class="select2_group form-control textbox">
                                <option value="NINGUNO">- Seleccione -</option> 
                                <option value="Valles Centrales"  >Valles Centrales</option>
                                <option value="Cañada" > Cañada</option>
                                <option value="Costa" > Costa</option>
                                <option value="Istmo" > Istmo</option>
                                <option value="Mixteca" > Mixteca</option>
                                <option value="Papaloapan" > Papaloapan</option> 
                                <option value="Sierra Norte" > Sierra Norte</option>
                                <option value="Sierra Sur" > Sierra Sur</option>
                                <option value="NINGUNO" > Ninguno</option>
                               
                            </select>  </label>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- <label class="form-check-label" >Defensor en especifico? 
                                    <input type="checkbox" checked id="checkId" name="checkDefensor" class="form-check-input" onchange="seleccionarUnDefensorExpediente(this.checked)" >                          
                                </label> -->
                            </div>
                            <div class="form-group col-md-6" id="idCheckDefensor" name="idCheckDefensor" style="display:none;">
                                <div class="form-inline">
                                    <label class="form-inline col-md-4" for="project">Eliga un defensor<span class="required">*</span></label>
                                        <input  class="form-inline col-md-6" data-error="Seleccione un defensor" type="text"  id="project"  required onchange="estadoInputExpediente(this.value)">                                                                                              
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
                                    <div class='block-help with-errors'></div>
                                    <div id="labelFinal" class='block-help with-errors'></div>
                                </label>
                            </div>                            
                        </div>                                              
                    </form>
                    <div class="row no-print">
                                   <div class="col-xs-11">
                                            <button class="btn btn-success pull-right" id="botonConsultarExpediente"   onclick="consultaExpediente();" style="margin-right: 100px;">
                                    <i class="fa fa-search "></i> Consultar</button>
                                    </div>
						             <div class="col-xs-1">
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
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
            <select id="filtro1" style="width:150px;" class="form-control" name="users" onchange="filtroGenerales(this.value)">                
                    <option value="etnia" >Etnias</option>
                    <option value="genero">Generos</option>
                    <option value="discapacidad">Discapacidades</option>
                    <option value="idioma">Idiomas </option>
                    <option value="sexo" selected="selected">Sexo</option>                                  \
                  </select></label>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                <div id="dialogoV" class="ui-widget">
                    </div>
                </div>
                   
                    <!-- ////////////////////////////////// -->

                           <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> </h2>
                  
                  </div>
                  <div class="x_content">

                    <table class="table table-stripe">
                      <thead id="theadConsultas">
                        <tr>
                          <th  style="vertical-align:middle;" rowspan="2">DATOS GENERALES</th>
                          <th   style="vertical-align:middle;"rowspan="2">TOTAL</th>
                          <th   colspan='2' class="text-center">SEXO</th>
                          <th   style="vertical-align:middle;"rowspan="2">OPCIONES</th>
                         
                        </tr>
                        <tr>
                          <th>Hombre</th>
                          <th>Mujer</th>
                        </tr>
                      </thead>
                      <tbody id="tbodyConsultas">
                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

                   


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                   
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                      <tr id="tabla2Cabezera">
                          <th  style="vertical-align:middle;" rowspan="2">DATOS GENERALES</th>
                          <th   style="vertical-align:middle;"rowspan="2">TOTAL</th>
                          <th   colspan='2' class=" sexo text-center">SEXO</th>
                          <th id="cabezeraOpcionesTabla2"  style="vertical-align:middle;"rowspan="2">OPCIONES</th>
                      
                        </tr>
                        <tr>
                          <th class="sexo">Hombre</th>
                          <th class="sexo">Mujer</th>
                        </tr>
                      </thead>
                      <tbody id="tbodyConsultasEspecificas">
                       
                      </tbody>
                    </table>


                  <table class="table table-striped" id="tablaAnidaEnSegundaTabla">
                      <thead>
                      <tr>
                          <th  style="vertical-align:middle;" rowspan="2">DATOS GENERALES</th>
                          <th   style="vertical-align:middle;"rowspan="2">TOTAL</th>
                         <!--  <th   colspan='2' class=" sexo text-center">SEXO</th> -->
                        
                        </tr>
                        <!-- <tr>
                          <th class="sexo">Hombre</th>
                          <th class="sexo">Mujer</th>
                        </tr> -->
                      </thead>
                      <tbody id="tbodyConsultasOpciones">
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabla 3</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabla 4</h2>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th>#</th>
                          <th>Datos generales</th>
                          <th>Total</th>
                          <th colspan='2'>Sexo</th>
                        </tr>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Hombre</th>
                          <th>Mujer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Table design <small>Custom design</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
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

                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Invoice </th>
                            <th class="column-title">Invoice Date </th>
                            <th class="column-title">Order </th>
                            <th class="column-title">Bill to Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Amount </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000040</td>
                            <td class=" ">May 23, 2014 11:47:56 PM </td>
                            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000039</td>
                            <td class=" ">May 23, 2014 11:30:12 PM</td>
                            <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i>
                            </td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$741.20</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000038</td>
                            <td class=" ">May 24, 2014 10:55:33 PM</td>
                            <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i>
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$432.26</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000037</td>
                            <td class=" ">May 24, 2014 10:52:44 PM</td>
                            <td class=" ">121000204</td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$333.21</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000040</td>
                            <td class=" ">May 24, 2014 11:47:56 PM </td>
                            <td class=" ">121000210</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000039</td>
                            <td class=" ">May 26, 2014 11:30:12 PM</td>
                            <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i>
                            </td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$741.20</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000038</td>
                            <td class=" ">May 26, 2014 10:55:33 PM</td>
                            <td class=" ">121000203</td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$432.26</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000037</td>
                            <td class=" ">May 26, 2014 10:52:44 PM</td>
                            <td class=" ">121000204</td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$333.21</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000040</td>
                            <td class=" ">May 27, 2014 11:47:56 PM </td>
                            <td class=" ">121000210</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000039</td>
                            <td class=" ">May 28, 2014 11:30:12 PM</td>
                            <td class=" ">121000208</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$741.20</td>
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>









                    
                    <!-- ////////////////////////////////// -->
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

 <script>seleccionarUnDefensorExpediente(true)</script>
<script>

$('#myform').validator()

</script>
