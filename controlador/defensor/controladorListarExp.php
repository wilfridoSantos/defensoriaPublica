<?php 
    include_once('../../modelo/defensor/defensor.php');
    include_once('../../modelo/expediente.php');

    $listaExpedientes = listar_expedientes();
    $contenido = json_encode($listaExpedientes);
 //echo $_GET['idPersonal'];
   if(isset($_GET['idPersonal'])){ 
          $misExpedietnesDefensor=json_encode(listar_expediente_x_defensor($_GET['idPersonal']));
          echo $misExpedietnesDefensor;
        }
?>