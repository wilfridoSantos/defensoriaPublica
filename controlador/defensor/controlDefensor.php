<?php 
    header('Content-Type: application/json');
    include '../../modelo/defensor/defensor.php';
    $cedulaProf = '25uCCYANARAW';//$_POST["num_cedula"];
   // echo $cedulaProf;
    
    //$listaDef = listar_defensores();
    $defensorX = obtenerDefensorCedula('25uCCYANARAW');
    $defensorXX = obtenerExpedientes();
    //echo 'datos de '.$defensorX->nombre;
    $num_regs = count($defensorX);//$listaDef->num_rows;
   // echo'num_Regs=> ' .$num_regs;
    if ($num_regs == 0) { //no encontro ningun registro 
        echo '<p class="text-danger"><strong>Error Numero de cedula o defensor inexistente</strong></p>';
    }else{
        $defensorZ = json_encode($defensorX);
        $defensorYY = json_encode($defensorXX);
        //echo 'va bienn';
    } 
    
    
 
       // echo'<script language="javascript">window.location="../../vistas/coordinador/index.php"</script>';
    
    
?>