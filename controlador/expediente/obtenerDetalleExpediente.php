<?php 
    header('Content-Type: application/json');
    include_once ('../../modelo/expediente.php');
    $numExp = $_GET['numExp'];
    $detalleExpediente = getExpedienteByNum($numExp);
   // echo $detalleExpediente;
    $encode = json_encode($detalleExpediente);
    echo $encode; 
?>