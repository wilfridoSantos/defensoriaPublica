<?php 
  include '../../controlador/defensor/controlDefensor.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>== Informe Anual ==</title>
      <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/Gestion.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="x_content">
        

        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <h3 >
          DETALLE INFORMACION DE DEFENSOR
        </h3>
            <tr class="header">
            <th>Foto de Perfil</th>
              <th>Nombre</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Lugar Adscripcion</th>
              <th>Numero Cedula</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            $defensor=json_decode($defensorZ);            
            //$obj = $defensor;
            //echo $obj['nombre'];
            foreach($defensor as $obj){
             echo '<tr>
             
             <td><img src="data:image/png; base64,'.base64_encode( '.obj->foto.' ).'"/></td>
              <td>'.$obj->nombre.'</td>
              <td>'.$obj->ap_paterno.'</td>
              <td>'.$obj->ap_materno.'</td>
              <td>'.$obj->juzgado.'</td>
              <td>'.$obj->cedula_profesional.'</td>
            </tr>';
          }
            ?>
          </tbody>
          

        </table>
            <br/>
            <div class="input-group custom-search-form">
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" onclick="myFunction()" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
        <table id="datatable2" class="table table-striped table-bordered">
          <thead><h3>LISTADO DE EXPEDIENTES </h3>
            <tr class="header">
              <th>Num. Exp</th>
              <th>Fecha Inicio</th>
              <th>Fecha Finalizacion</th>
              <th>Tipo Delito</th>
              <th>Nombre Delito</th>
              <th>Estado</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            $defensor=json_decode($defensorYY);            
            //$obj = $defensor;
            //echo $obj['nombre'];
            foreach($defensor as $obj){
             echo '<tr>
             
             <td>'.$obj->num_expediente.'</td>
              <td>'.$obj->fecha_inicio.'</td>
              <td>'.$obj->fecha_final.'</td>
              <td>'.$obj->tipo_delito.'</td>
              <td>'.$obj->nombre_delito.'</td>
              <td>'.$obj->estado.'</td>
            </tr>';
          }
            ?>
          </tbody>
          

        </table>
    
        
      </div>
</body>

</html>

