<?php 
    include '../../modelo/actividad.php';    
        $fechaInicio =$_POST['fechaI'];
        $fechaFinal = $_POST['fechaF'];    
        if($_POST['R2'] == true){
            $informeGeneralAct = getActividadesByRangoFecha($fechaInicio, $fechaFinal);
            $informeEncode = json_encode($informeGeneralAct);
            echo $informeEncode;
        }else if($_POST['R2'] == true){            
            $puesto = $_POST['puesto'];
            $informeGeneralAct = getActividadesByFiltroPersonal($fechaInicio, $fechaFinal,$puesto);
            $informeEncode = json_encode($informeGeneralAct);
            echo $informeEncode;
        }else if($_POST['R3'] == true){
            $nue = $_POST['nue'];           
            $informeGeneralAct = getActividadesByFiltroNue($fechaInicio, $fechaFinal, $nue);
            $informeEncode = json_encode($informeGeneralAct);
            echo $informeEncode;
        }  
          
?>
