<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Modulo Coordinador General</title>
      <script src="../../recursos/js/main.js"></script>
      <script  type="text/javascript" src="../../recursos/vendors/jquery/jquery-ui.js"></script>
 <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link href="../../recursos/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../recursos/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->
      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>

<body>
<div class="x_content">
        <h3 ><b>
          LISTA DEFENSORES
          </b>
        </h3>
       <div class="input-group" style="width:70%;">
                                <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor...">
                            </div>
<<<<<<< HEAD
                            
        <div id="mData"></div>

        <table id="datatable" class="table table-striped table-bordered">
=======
        
<<<<<<< HEAD
        <table id="datatable" class="table table-striped ">
          <thead>
=======
        <table id="datatable" class="table table-striped table-bordered  dt-responsive nowrap">
>>>>>>> 65af769caa359e79b2910072008e82cf4df918da
          <thead  >
>>>>>>> b2f9a75f9afd4fa390a17964c6886647dc8b1154
            <tr class="header">
              <th>NOMBRE</th>
              <th>AP. PATERNO</th>
              <th>AP. MATERNO</th>
              <th>LUGAR ADSCRIPCION</th>                   
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody id='tebody'>
        <?php include '../../controlador/defensor/controladorListaDef.php';
            $defensores=json_decode($contenido);
            //print_r($defensores);
            foreach($defensores as $obj){
              //print_r('=> '. $obj->estado);
              if($obj->estado){                
                echo '<tr> '.
                  '<td id="idPersonal" style="display:none;">'.$obj->id_personal.'</td>'.
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
        ?>
          </tbody>  
        </table>
       
        
      </div>
          </body>
          </html>
