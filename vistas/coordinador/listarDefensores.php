<?php 
  include '../../controlador/defensor/controladorListaDef.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Informe Anual </title>
      <script src="../../recursos/js/main.js"></script>

     
</head>
<body>
<div class="x_content">
        <p class="text-muted font-13 m-b-30">
          lista de los defensores
        </p>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por numero cedula..">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr class="header" >
              <th>nombre</th>
              <th>juzgado</th>
              <th>telefono</th>
              <th>correo</th>
            </tr>
          </thead>
          <tbody>
            <?php

            //print_r($arrayDef);
          //  print_r($json);
            $defensor=json_decode($contenido);
             // print_r($defensor);
            
            
            foreach($defensor as $obj){
                
             echo '<tr>
              <td>'.$obj->nombre.'</td>
              <td>'.$obj->juzgado.'</td>
              <td>'.$obj->telefono.'</td>
              <td>'.$obj->corre_electronico.'</td>
              </tr>';
            }

            ?>
          </tbody>

        </table>
      </div>
</body>
</html>
