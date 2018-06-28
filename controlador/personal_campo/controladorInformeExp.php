<?php 
    include '../../modelo/expediente.php';    
    if(isset($_POST['nue'])){
        $fechaInicio =$_POST['fechaI'];
        $fechaFinal = $_POST['fechaF'];
        $nue = $_POST['nue'];             
        $informeGeneralExpNue = getExpedientesByFiltroNue($fechaInicio, $fechaFinal, $nue);
        $informeEncodeNue = json_encode($informeGeneralExpNue);
        echo $informeEncodeNue; 
    }else {
        $fechaInicio = $_POST['fechaI'];
        $fechaFinal  = $_POST['fechaF'];            
        $informeGeneralExp = getExpedientesByRangoFecha($fechaInicio, $fechaFinal);        
        $informeEncode = json_encode($informeGeneralExp);
        echo $informeEncode; 
    }
?>
