<?php 
  
  //$cedula = $_GET['cedula']
  //include '../../controlador/defensor/controlDefensor.php';
  //echo $_GET['cedula'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>== Ver Info defensor ==</title>
      <script src="../../recursos/js/main.js"></script>
      <script src="../../recursos/js/Gestion.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>
</head>
<body>
<div class="x_content">
        
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
              <th>Numero expediente</th>
              <th>fecha inicio</th>
              <th>Fecha Finalizacion</th>
              <th>Tipo Delito</th>
              <th>Nombre Delito</th>
              <th>Estado</th>
             
            </tr>
          </thead>
          <tbody id ="verExpDefensor">
            
          </tbody>
          

        </table>
    
        
      </div>
</body>

</html>

