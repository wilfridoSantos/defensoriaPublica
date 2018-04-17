<?php 
  include '../../controlador/defensor/controladorListaDef.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>== Informe Anual ==</title>
      <script src="../../recursos/js/main.js"></script>

      <link href="../../recursos/css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="x_content">
        <p class="text-muted font-13 m-b-30">
          lista de los defensores
        </p>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por numero cedula..">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
<<<<<<< HEAD
            <tr>
              <th>nombre</th>
              <th>juzgado</th>
              <th>telefono</th>
              <th>correo</th>
=======
            <tr class="header">
              <th>id Defensor</th>
              <th>id_juzgado</th>
              <th>id_estudio</th>
              <th>numero cedula</th>
>>>>>>> a1477c085b1969ac44c57737617f222d39756546
            </tr>
          </thead>
          <tbody>
            <?php

<<<<<<< HEAD
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

=======
              while($row = $listaDef->fetch_assoc()){

                echo "<tr>
                          <td>".$row['id_defensor']."</td>
                          <td>".$row['id_juzgado']."</td>
                          <td>".$row['id_estudios']."</td>
                          <td>".$row['numero_cedula_profesional']."</td>
                    </tr>";
              }
>>>>>>> a1477c085b1969ac44c57737617f222d39756546
            ?>
          </tbody>

        </table>
      </div>
</body>
</html>
