<?php
    include_once('../../modelo/expediente.php');
  
    header('Content-Type: application/json');
$notificaciones = notificacionExpedienteSinAtencion();
//print_r($notificaciones);
echo json_encode($notificaciones);


    
?>