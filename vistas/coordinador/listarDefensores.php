<?php
  $queryDef = listar_defensores();
  $arrayDef = $queryDef-> fetch_assoc();
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
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Direccion</th>
              <th>Telefono</th>
              <th>Cantidad de benificiarios</th>
            </tr>
          </thead>


          <tbody>
            <a href="#" ><tr >
              <td>$arrayDef[0]['id_defensor']</td>
              <td>System Arckasmflhitect</td>
              <td>Edinburasjnfgh</td>
              <td>Edinburgh</td>
              <td>34</td>
              <td>9512345676</td>
            </tr></a>
            <tr>
              <td>Garrete esta Winters</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>Tokyo</td>
              <td>34</td>
              <td>9512345676</td>
            </tr>
            <tr>
              <td>Ashton lkjdlkajldkjask</td>
              <td>Junior Technical Author</td>
              <td>San Francisco</td>
              <td>Tokyo</td>
              <td>43</td>
              <td>9512345676</td>
            </tr>



            <tr>
              <td>Michael Bruce</td>
              <td>Javascript Developer</td>
              <td>Singapore</td>
              <td>Singapore</td>
              <td>34</td>
              <td>9512345676</td>
            </tr>
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>Junior</td>
              <td>Singapore</td>
              <td>24</td>
              <td>9512345676</td>
            </tr>
          </tbody>
        </table>
      </div>
</body>
</html>
