<?php
     include_once('../../controlador/defensor/controladorListaDef.php');
?>

<!-- ESTADISTICA Y HERRAMIENTAS MAS JQUERY UI-->
<script src="../../recursos/js/estadistica/atendiendoEstadistica.js"></script>
<script src="../../recursos/js/jquery-ui.1.12.1.js"></script> 
<script src="../../recursos/js/herramienta.js"></script> 
 <!-- PDFMAKE -->
<script src='../../recursos/vendors/pdfmake/build/pdfmake.min.js'></script>
<script src='../../recursos/vendors/pdfmake/build/vfs_fonts.js'></script>
<script src="../../recursos/js/coordinador/headerPDF.js"></script>
<!-- VALIDATOR Y CSS -->
<link href="../../recursos/css/custom.css" rel="stylesheet" />
<script src="../../recursos/js/jquery-validator.js"></script>

<script type="text/javascript">

  google.charts.load('current', {'packages':['corechart']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
console.log( ' google');
      function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b>Solicitar consulta de actividades<b></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="myform" data-toggle="validator" role="form" class="form-horizontal form-label-left" >
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
                                <select required="required"  id="selectSistema" name="selectSistema" data-error="Seleccione un sistema." aria-controls="datatable-responsive" class="form-control input-sm" onchange="myFunctionDate(this.value)">
                                    <option value="">Seleccione un sistema</option>
                                    <option value="TRADICIONAL">Tradicional</option>
                                    <option value="ORAL">Acusatorio y Oral</option>
                                    <option value="JUSTICIA">Justicia para Adolecentes</option>
                                    <option value="ALL">Todos</option>
                                </select>
                                <div  class="help-block with-errors"></div> 
                    </div>
                      </div>
                      <div class="form-group" id="checkDefensor" name="checkDefensor">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Defensor en especifico? </label>
                        <div class="col-sm-1 ">
                          <input type="checkbox" unchecked id="checkDefensor" name="checkDefensor" class="form-control" onchange="seleccionarUnDefensor(this)" >                          
                        </div>
                        <div id="idCheckDefensor" name="idCheckDefensor" style="display:none;">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input data-error="Seleccione un defensor" type="text"  id="project"  required class="form-control col-md-7 col-xs-12">                          
                                <div  class="help-block with-errors"></div>
                            </div>
                            <div class="form-horizontal form-label-left">
                              <div class="form-group ">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nue"><span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <table required="" id="tablaAsinacionExpedienteusuario" class="table table-striped ">
                                          <tbody required="" id="usuarioSeleccionados" style="height: 200px; width:915px; overflow: auto;" class=" ui-widget-content"></tbody></table>
                                    <div class="help-block with-errors"></div>
                                </div>
                              </div>
                            </div>
                            <input type="text" name="usuarios" id="usuarios"   style="display:none;" class="form-control col-md-7 col-xs-12"/>                    
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Consultas <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">                        
                                <select required="required"  id="selectConsulta" name="selectConsulta" data-error="Seleccione un sistema." aria-controls="datatable-responsive" class="form-control input-sm" onchange="myFunctionDate(this.value)">
                                    <option value="">Seleccione una consulta para las actividades</option>
                                    <option value="NUM">Numero de actividades realizadas</option>
                                    <option value="C2">Consulta2</option>
                                    <option value="C3">Consulta3</option>
                                </select>
                                <div  class="help-block with-errors"></div> 
                    </div>
                      </div>

                    <div class="row no-print">
						             <div class="col-xs-12">
						               <button class="btn btn-success pull-right" id="botonDesc" name ="botonDesc" disabled onclick="solicitarConsultaAct();" style="margin-right: 5px;">
						                <i class="fa fa-download"></i> Realizar consulta</button>
					             </div>
						           </div>
                       </form>
                  </div>
                    <div id="resultadoConsulta" name="resultadoConsulta" >
                          <div id="chart_div"></div>
                    </div>
                </div>
              </div>

              

<script src="../../recursos/js/jquery-validator.js"></script>


<script>    
    cargarInputDefensor();
    $('#myform').validator();    
</script>
	