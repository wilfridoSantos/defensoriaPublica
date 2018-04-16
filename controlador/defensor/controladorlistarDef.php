<?php 
    include "../modelo/defensor.php";

    
    $num_regs = $listaDef->num_rows;


    if ($num_regs == 0) { //no encontro ningun registro 
        echo '<p class="text-danger"><strong>Aun no existen defensores agregados al sistema</strong></p>';
    }else{
        require_once("vistas/coordinador/listarDefensores.php");
    } 

?>