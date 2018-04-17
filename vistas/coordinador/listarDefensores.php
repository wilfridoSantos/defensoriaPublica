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
        <h3 id="listaDef" style="color:#DF0101">
          lista de los defensores
        </h3>
       <div class="input-group custom-search-form">
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" onclick="myFunction()" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr class="header">
              <th>id Defensor</th>
              <th>id_juzgado</th>
              <th>id_estudio</th>
              <th>numero cedula</th>
            </tr>
          </thead>
          <tbody>
            <?php

              while($row = $listaDef->fetch_assoc()){
                echo "<tr>
                          <td>".$row['id_defensor']."</td>
                          <td>".$row['id_juzgado']."</td>
                          <td>".$row['id_estudios']."</td>
                          <td>".$row['numero_cedula_profesional']."</td>
                    </tr>";
              }
            ?>
          </tbody>

        </table>
      </div>
</body>
</html>
