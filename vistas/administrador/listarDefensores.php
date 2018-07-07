    <title>Modulo Coordinador General</title>
      <!-- <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
   <link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css"> 
    <link href="../../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script> -->
      <!-- <link href="../../recursos/css/style.css" rel="stylesheet"/>
 -->
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->
<!-- <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
 -->  

  <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script> 
   <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/jquery-ui.1.12.1.js"></script>
      <!-- <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
       --><link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../recursos/js/main.js"></script><!-- 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->

<script>

//$(document).ready(function () {
    function tabla(){
    //$('#example').DataTable(); 
    

 $('#example').DataTable({
searching: false,

	
language: {
	"decimal":        "",
	"emptyTable":     "No hay datos",
	"info":           "mostrando _START_ a _END_ de _TOTAL_ pagina",
	"infoEmpty":      "mostrando 0 datos",
	"infoFiltered":   "(filtered from _MAX_ total entries)",
	"infoPostFix":    "",
	"thousands":      ",",
	"lengthMenu":     "mostrar de _MENU_ paginas",
	"loadingRecords": "Loading...",
	"processing":     "Processing...",
	"search":         "Buscar:",
	"zeroRecords":    "No matching records found",
	
	"aria": {
		"sortAscending":  ": activate to sort column ascending",
		"sortDescending": ": activate to sort column descending"
	},	"emptyTable":     "No hay datos",

	paginate: {
		previous: 'Atras',
		next:     'Siguiente'
	},
	aria: {
		paginate: {
			previous: 'Atras',
			next:     'Siguiente'
		}
	}
},

}); $('.idPersonal').hide();
}
//});
          </script>
     <link href="../../recursos/css/style.css" rel="stylesheet"/>


      <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><b>Lista de Defensores </b></h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">
                   
                    <div class="col-sm-6">
                        <div id="datatable-responsive_filter" class="dataTables_filter">
                            <label>Buscar por Defensor:
                              <input type="text" id="buscarCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor..." aria-controls="datatable-responsive">
                                
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">      
                    <div class="col-sm-12">
                        <div id="dialogo" title="Confirma eliminar"><span id="msnDialog" style="display:none"> Tiene al menos un expediente</span></div>
                        <table id="example" class="table nowrap ui table" cellspacing="0" width="100%">
                       <!--  <table id="example" class="table ui table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                     -->
                    <!--     <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            cellspacing="0" width="100%" role="grid" aria-describedby="datatable-responsive_info" style="width: 100%;">
                     -->        <thead>
                                <tr role="row">
                                    <th class="idPersonal">NUM</th>
                                    <th>NOMBRE</th>
                                    <th >A. PATERNO</th>
                                    <th >A. MATERNO</th>
                                    <th >LUGAR ADSCRIPCIÓN</th>
                                    <th >ACCIONES</th>
                                    </tr>
                            </thead>
                            <tbody id="tebody" >

                            <?php include '../../controlador/defensor/controladorListaDef.php';
                               $defensores=json_decode($contenido);
                              //print_r($defensores);
                              foreach($defensores as $obj){
                                //print_r('=> '. $obj->estado);
                                if($obj->estado){                
                                  echo '<tr role="row" class="odd gradeA"> '. //OR oven || odd
                                    '<td  class="idPersonal" id="idPersonal" style="display:none; visibility:hidden;">'.$obj->id_personal.'</td>'.
                                    '<td>'.strtoupper($obj->nombre).'</td>'.
                                    '<td>'.strtoupper($obj->ap_paterno).'</td>'.
                                    '<td>'.strtoupper($obj->ap_materno).'</td>'.
                                    '<td>'.strtoupper($obj->juzgado).'</td>'.                                          
                                  
                                    '<td><button type="button" class="btn btn-primary botonExp" id="botonExp" name="expedientes">'.
                                      '<span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span></button>'.
                                    '<button type="button" class="btn btn-primary boton" id="boton" name="info">'.
                                      '<span class="glyphicon glyphicon-user" aria-hidden="true"> </span></button>'.
                                    '<button type="button" class="btn btn-warning botonUp" id="botonUp" name="botonUp">'.
                                        '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>'.
                                    '<button type="button" class="btn btn-danger botonDel" id="botonDel" name="botonDel">'.
                                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'.
                                    '</td> </tr>';
                                  }            
                                } 
                                echo "<script> tabla() </script>"
                          ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

