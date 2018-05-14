<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaExpedientes = listar_expedientes();
    $contenido = json_encode($listaExpedientes);
?>