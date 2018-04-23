<?php 
  include '../../controlador/defensor/controladorListaDef.php';
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
        <h3 id="listaDef" style="color:#000000">
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
              <th>Nombre</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Lugar Adscripcion</th>
              <th>Numero Cedula</th>
              <th>accion</th>
            </tr>
          </thead>
          <tbody >
            <?php
            $defensor=json_decode($contenido);
            foreach($defensor as $obj){
             echo '<tr>
              <td>'.$obj->nombre.'</td>
              <td>'.$obj->ap_paterno.'</td>
              <td>'.$obj->ap_materno.'</td>
              <td>'.$obj->juzgado.'</td>
              <td name="cedulaProfesional">'.$obj->cedula_profesional.'</td>
            <td>
							<button type="button" class="btn btn-info" id="boton1" name="info" onclick="verInfoDefensor()" ><span class="glyphicon glyphicon-user" aria-hidden="true"> </span></button>
							<button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-warning" onclick="actualizarDefensor()"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
            </td> 
            </tr>';
            }
            ?>
          </tbody>
          

        </table>
        
      </div>
      
</body>

</html>

