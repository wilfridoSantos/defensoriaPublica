<?php 
    //
    include '../../modelo/defensor/defensor.php';
    
    $listaDef = listar_defensores();

    $num_regs = count($listaDef);//$listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
        echo '<p class="text-danger"><strong>Aun no existen defensores agregados al sistema</strong></p>';
    }else{
        $contenido = json_encode($listaDef);
        //echo 'va bienn';
        //echo '<script> $('#menuContainer').load("listarDefensores.php")</script>';
        //header('Location: ../../vistas/coordinador/listarDefensores.php');
    }

?>