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
 <link rel="stylesheet" href="../../recursos/vendors/jquery/jquery-ui-themes-1.12.1/jquery-ui.css"> 
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
          LISTA USUARIOS DE SERVICIO
          </b>
        </h3>
       <div class="input-group" style="width:70%;">
                                <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor...">
                            </div>

                            
        <div id="mData"></div>

        <table id="datatable" class="table table-striped ">
         
          <thead>

            <tr class="header">
              <th>NOMBRE</th>
              <th>AP. PATERNO</th>
              <th>AP. MATERNO</th>
              <th>ETNIA</th> 
              <th>CURP</th>                  
  
            </tr>
          </thead>
          <tbody id='tebody'>
        <?php include '../../controlador/defensor/controladorListaUser.php';
            $usuarios=json_decode($contenido);
            //print_r($defensores);
            foreach($usuarios as $obj){
              //print_r('=> '. $obj->estado);
                            
                echo '<tr> '.
                  '<td id="idPersonal" style="display:none;">'.$obj->id_usuario_servicio.'</td>'.
                  '<td>'.strtoupper($obj->nombre).'</td>'.
                  '<td>'.strtoupper($obj->ap_paterno).'</td>'.
                  '<td>'.strtoupper($obj->ap_materno).'</td>'.
                  '<td>'.strtoupper($obj->etnia).'</td>'.
                  '<td>'.strtoupper($obj->curp).'</td>'.                                          
                ' </tr>';
                           
              }
        ?>
          </tbody>  
        </table>
       
        
      </div>
          </body>
          </html>
