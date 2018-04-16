<?php 
  include '../../controlador/defensor/controladorListaDef.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>== Informe Anual ==</title>

</head>
<body>
<div class="x_content">
        <p class="text-muted font-13 m-b-30">
          lista de los defensores
        </p>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>id Defensor</th>
              <th>id_juzgado</th>
              <th>id_estudio</th>
              <th>numero cedula</th>
            </tr>
          </thead>
          <tbody>
            <?php
             /* while($registroDef = $listaDef->fetch_array(MYSQLI_BOTH)){
                echo '<tr>
                          <td>'.$registroDef['id_defensor'].'</td>
                          <td>'.$registroDef['id_juzgado'].'</td>
                          <td>'.$registroDef['id_estudios'].'</td>
                          <td>'.$registroDef['numero_cedula_profesional'].'</td>
                      </tr>
                ';

              }*/
              $registroDef = $listaDef-> fetch_assoc();
              echo '<tr>
              <td>'.$registroDef['id_defensor'].'</td>
              <td>'.$registroDef['id_juzgado'].'</td>
              <td>'.$registroDef['id_estudios'].'</td>
              <td>'.$registroDef['numero_cedula_profesional'].'</td>
              </tr>';
            ?>
          </tbody>

        </table>
      </div>
</body>
</html>
