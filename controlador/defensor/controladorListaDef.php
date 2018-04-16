<?php 
    header('Content-Type: application/json');
    include '../../modelo/defensor/defensor.php';

    
    $listaDef = listar_defensores();
 

    $num_regs = $listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
        echo '<p class="text-danger"><strong>Aun no existen defensores agregados al sistema</strong></p>';
    }else{
        //require_once("vistas/coordinador/listarDefensores.php");
        //echo'<script language="javascript"> window.location="../../vistas/coordinador/listarDefensores.php"</script>';
        //echo 'si hay defensores controladorListsDEef son: '.$num_regs;
        //return  $listaDef;
        $arrayDef = $listaDef->fetch_array();
    } 

?>