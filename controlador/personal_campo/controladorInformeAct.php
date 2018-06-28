<?php 
    include '../../modelo/actividad.php';    
    if(isset($_POST['nue'])){
        $fechaInicio =$_POST['fechaI'];
        $fechaFinal = $_POST['fechaF'];
        $nue = $_POST['nue'];             
        $informeGeneralActNue = getActividadesByFiltroNue($fechaInicio, $fechaFinal, $nue);
        $informeEncodeNue = json_encode($informeGeneralActNue);
        echo $informeEncodeNue; 
    }else {
        $fechaInicio = $_POST['fechaI'];
        $fechaFinal  = $_POST['fechaF'];            
        $informeGeneralAct = getActividadesByRangoFecha($fechaInicio, $fechaFinal);        
        $informeEncode = json_encode($informeGeneralAct);
        echo $informeEncode; 
    }
?>
