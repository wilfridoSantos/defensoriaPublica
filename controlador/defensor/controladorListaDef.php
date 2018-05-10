<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    //print_r($listaDef);
    $contenido = json_encode($listaDef);
?>