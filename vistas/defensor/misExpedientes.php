<?php
session_start();
$idpersonal=$_SESSION['personal'];
//print_r($idpersonal[0]['id_personal']);
//include '../../controlador/defensor/controladorListarExp.php?idPersonal='.$idpersonal[0]['id_personal'];
//print_r($idpersonal);
//print_r($misExpedietnesDefensor);
 ?>
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
      <link href="../../recursos/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link href="../../recursos/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../recursos/css/custom.css" rel="stylesheet"/>
    <script src="../../recursos/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../recursos/js/main.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->


      <script src="../../recursos/js/coordinador/atendiendoCoordinador.js"></script>
      <link href="../../recursos/css/style.css" rel="stylesheet"/>

      <script>
      $.get("../../controlador/defensor/controladorListarExp.php?idPersonal="+<?php echo $idpersonal[0]['id_personal']?>,function(data){
        var jsonMisExp = jQuery.parseJSON(data);
          $.each(jsonMisExp, function (KEY, VALOR) {
                    var nomBoton;
                    if(VALOR.id_personal < 0) {
                        nomBoton = '<button type="button" class="btn btn-danger botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Asignar Defensor</button>';                  
                    }else{
                        nomBoton = '<button type="button" class="btn btn-primary botonCambioDefensor" id="botonCambioDef" name="botonCambioDef">Cambiar Defensor</button>';
                    } 
                    
                     $('#tebody').append(
                        '<tr> '+
                        '<td id="idPersonal" style="display:none;">'+VALOR.id_personal+' </td>'+
                        '<td>'+VALOR.num_expediente+'</td>'+
                        '<td>'+VALOR.materia+'</td>'+
                        '<td>'+VALOR.fecha_inicio+'</td>'+
                        '<td>'+VALOR.nombre+'</td>'+                                                     
                        ' <td><button type="button" class="btn btn-primary botonDetalleUsuario" id="detalleUsuario" name="botonCambioDef">Detalle Usuario</button></td>'
                    ); 
                });  
        console.log("ffff",jsonMisExp);
});
      </script>

<body>
<div class="x_content">
        <h3 ><b>
          <center>
          LISTA EXPEDIENTES
          </center>
          </b>
        </h3>
       <div class="form-group">
                                <div class="left" style="width:45%;">                                     
                                  <input type="text" id="inputCedula" onkeyup="buscarXCedula()" class="form-control" placeholder="Nombre Defensor...">                                                                                                
                                  
                                </div>
                                <div class="right" >
                                  <select  class="mySelectFiltro"  name="users" onchange="showUser(this.value)" >
                                    
                                    <potion value="">Listar Expedientes por estado</option>
                                    <option value="1">Activos</option>
                                    <option value="2">Inactivos</option>
                                    <option value="3">Todos</option>                                  \
                                  </select>
                                </div>
                            </div>
        
        <table id="datatable" class="table table-striped table-bordered">
          <thead  >
            <tr class="header">
              <th>NUM. EXPEDIENTE</th>
              <th>MATERIA</th>
              <th>FECHA DE INICIO</th> 
              <th>Nombre</th> 

              <th>ACCION</th>
            </tr>
          </thead>
          <tbody id='tebody'>
        
          </tbody>  
        </table>

  
       
        
      </div>

          </body>
          </html>
