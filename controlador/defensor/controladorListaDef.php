<?php 
    include '../../modelo/defensor/defensor.php';
    $listaDef = listar_defensores();
    $num_regs = count($listaDef);//$listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
    }else{
       // print_r($listaDef);
        $contenido = json_encode($listaDef);
    }

?>