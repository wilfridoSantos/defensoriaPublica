<?php 
  //include '../../controlador/defensor/controladorListaDef.php';
 // header('Content-Type: application/json');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>Informe Anual </title>
      <script src="../../recursos/js/main.js"></script>

      <script src="../../recursos/js/Gestion.js"></script>
      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>
</head>
<body>

<div class="x_content">
        <h3 >
          lista de los defensores
        </h3>
       <div class="input-group custom-search-form">
                                <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Cedula Profesional...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" onclick="buscarXCedula()" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
        
        <table id="datatable" class="table table-striped table-bordered">
          <thead  >
            <tr class="header">
              <th>Nombre</th>
              <th>Ap. Paterno</th>
              <th>Ap. Materno</th>
              <th>Lugar Adscripcion</th>
              <th>Numero Cedula</th>
              <th>acciones</th>
            </tr>
          </thead>
          <tbody id='tebody' >
            
          </tbody>
          

        </table>
       
        
      </div>
      
</body>

</html>

