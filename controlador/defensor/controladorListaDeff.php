<?php 
    include_once('../../modelo/defensor/defensor.php');
    $listaDef = listar_defensores();
    $contenido = json_encode($listaDef);
    echo $contenido;
?>