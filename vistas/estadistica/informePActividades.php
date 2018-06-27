
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
 	<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>

<script src="../../recursos/js/main.js"></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>
<!-- <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
 -->
<link href="../../recursos/css/custom.css" rel="stylesheet" />

<script src="../../recursos/js/jquery-validator.js"></script>
<script type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Generar informe parcial de actividades<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="myform" data-toggle="validator" role="form"  class="form-horizontal form-label-left" novalidate="">
                    <label class="control-label " style="padding-left:300px;" >PERIODO 
                        </label><br>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputInicio"  required="required" data-error="Seleccione una fecha valida." class="form-control controlFecha"  data-error="Debe ser menor a la fecha Final." name="inputInicio" onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)"  step="1">                                                   
                          <div  class="help-block with-errors"></div> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha Final <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="inputFinal" name="inputFinal" required="required" data-error="Seleccione una fecha valida." class="form-control controlFecha"  onblur="myFunctionDate(this)" onkeyup="myFunctionDate(this)" step="1">
                          <div  class="help-block with-errors"></div> 
                          <div id="labelFinal" class='block-help with-errors'></div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistema <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">                        
                                <select required="required"  id="selectSistema" name="selectSistema" data-error="Seleccione un sistema." aria-controls="datatable-responsive" class="form-control input-sm" onchange="myFunctionSistema(this.value)">
                                    <option value="">Seleccione un sistema</option>
                                    <option value="T">Tradicional</option>
                                    <option value="O">Acusatorio y Oral</option>
                                    <option value="J">Justicia para Adolecentes</option>
                                    <option value="ALL">Todos</option>
                                </select>
                                <div  class="help-block with-errors"></div> 
                    </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Atributos a solicitar <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">                        
                                <select required="required" id="selectAtributos" name="selectAtributos" style="height:110px;" data-error="Seleccione uno o mas atributos." name="datatable-responsive_length" multiple="multiple" aria-controls="datatable-responsive" class="form-control input-sm">                                                                        
                                    <option value="SEX" selected="selected">Sexo</option>
                                    <option value="GEN">Genero</option>
                                    <option value="EDA">Edad</option>
                                    <option value="ETN">Etnia</option>
                                    <option value="IDI">Idioma o Lengua</option>
                                    <option value="DIS">Discapacidad</option>                                    
                                </select>
                                <div  class="help-block with-errors"></div> 
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

<script src="../../recursos/js/jquery-validator.js"></script>
<script>

$('#myform').validator()

</script>
	