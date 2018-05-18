<?php 
    include_once('../../modelo/defensor/juzgado.php');
    $listaDef = listar_defensores();
    $contenido = json_encode($listaDef);

    
?>