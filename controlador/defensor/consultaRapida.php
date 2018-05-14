<?php 
include '../../modelo/defensor/defensor.php';
    $id_defensor = $_GET['id_personal'];    
    $expedientes = getNumExpedientes($id_defensor);
    echo $expedientes;
?>