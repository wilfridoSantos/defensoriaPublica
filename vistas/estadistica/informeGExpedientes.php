

<script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>
<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>

<script src="../../recursos/js/coordinador/gestionGrafica.js"></script>
<script src="../../recursos/js/coordinador/gestionGraficaPorDefensor.js"></script>
<script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
<script src="../../recursos/js/coordinador/funcionesExpGeneralesPDF.js"></script>

<script src="../../recursos/js/coordinador/pdfExpedientesGByDefPeriodo.js"></script>
<script src="../../recursos/js/coordinador/pdfExpedientesGPeriodo.js"></script>
<script src="../../recursos/js/coordinador/pdfExpedientesGByDefCompleto.js"></script>
<script src="../../recursos/js/coordinador/pdfExpedientesGCompleto.js"></script>




<link href="../../recursos/css/custom.css" rel="stylesheet" />
<script src="../../recursos/js/jquery-validator.js"></script>

 <script>seleccionarUnDefensor(true)</script>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Generar informe general de expedientes<b></h2>                    
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
                                    <div class='block-help with-errors'></div>
                                    <div id="labelFinal" class='block-help with-errors'></div>
                                </label>
                            </div>                            
                        </div>                                              
                    </form>
                    <div class="row no-print">
                                    <div class="col-xs-11">
                                            <button class="btn btn-success pull-right" id="botonConsultarExpediente"   onclick="generarConsultaExpedientesGeneral();" style="margin-right: 100px;">
                                    <i class="fa fa-search "></i> Consultar</button>
                                    </div>
						             <div class="col-xs-1">
						               <button class="btn btn-success pull-right" id="botonDesc" disabled onclick="generarPDFExpedientesGeneral();" style="margin-right: 5px;">
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
                   
                    <div class="col-sm-4" id="divGeneralCompleto">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
                            <select id="filtro1" style="width:150px;" class="form-control" name="users" onchange="gestionGrafica(this.value)">                
                    <option value="region"selected="selected" >Región</option>
                    <option value="genero">Generos</option>
                    <option value="materia">Materias</option>
                    <option value="idioma">Idiomas</option>
                    <option value="etnia">Etnias</option>
                    <option value="discapacidad">Discapacidades</option>                                  \
                    <option value="expediente">Expedientes</option>                                  \
                  </select></label>
                        </div>
                    </div>
                    <div class="col-sm-4" id="divGeneralCompletoDefensor">
                        <div class="dataTables_length Filtro" id="datatable-responsive_length">
                            <label>Filtro 1
                            <select id="filtro2" style="width:150px;" class="form-control" name="users" onchange="gestionGraficaPorDefensor(this.value)">                
                    <option value="region"selected="selected" >Región</option>
                    <option value="genero">Generos</option>
                    <option value="idioma">Idiomas</option>
                    <option value="etnia">Etnias</option>
                    <option value="discapacidad">Discapacidades</option>                                  \
                    <option value="expediente">Expediente</option>                                  \
                  </select></label>
                        </div>
                    </div>
                  
                </div>
                <div class="row">
                <div id="dialogoV" class="ui-widget">
                    </div>
                </div>

                <div id="divGraficas">
                    <div id="columnchart_one" style="width: 900px; height: 300px;"></div>
                    <div id='buttonone'></div>
                        <div id="columnchart_two" style="width: 900px; height: 300px;"></div> 
                        <div id='buttontwo'></div>
                </div>
                    <div class="col-sm-12" id="tablaConsulta">
                        <table id="datatable-responsive" class="table table-striped dt-responsive nowrap" >
                            <thead>
                                <tr role="row">
                                    <th >Defensor</th>
                                    <th >Usuario</th>
                                    <th >Fecha registro</th>
                                    <th >Observaciones</th>
                                    <th >Acciones</th>
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
      </div>
    </div>
  </div>
</div> 
<script>

$('#myform').validator()
$('#tablaConsulta').hide()

</script>

<!-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
<div id="columnchart_two" style="width: 900px; height: 300px;"></div> 
 -->

