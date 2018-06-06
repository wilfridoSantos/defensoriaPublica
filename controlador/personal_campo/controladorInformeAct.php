<?php 
    include '../../modelo/actividad.php';    
    if(isset($_POST['nue'])){
        $fechaInicio =$_POST['fechaI'];
<<<<<<< HEAD
        $fechaFinal = $_POST['fechaF'];
        $nue = $_POST['nue'];             
        $informeGeneralActNue = getActividadesByFiltroNue($fechaInicio, $fechaFinal, $nue);
        $informeEncodeNue = json_encode($informeGeneralActNue);
        echo $informeEncodeNue; 
    }else {
        $fechaInicio =$_POST['fechaI'];
        $fechaFinal = $_POST['fechaF'];            
        $informeGeneralAct = getActividadesByRangoFecha($fechaInicio, $fechaFinal);
        $informeEncode = json_encode($informeGeneralAct);
        echo $informeEncode; 
    }
=======
        $fechaFinal = $_POST['fechaF'];   
        //echo 'valores -->'.$_POST['R1'].' '.$_POST['R3'].' '.$_POST['R3']; 
        
        if($_POST['R1'] === true ){
            $informeGeneralAct = getActividadesByRangoFecha($fechaInicio, $fechaFinal);
            $informeEncode = json_encode($informeGeneralAct);
            echo $informeEncode;
        }
        if($_POST['R2'] === true){

            $puesto = $_POST['puesto'];
            $informeGeneralAct = getActividadesByFiltroPersonal($fechaInicio, $fechaFinal,$puesto);
            $informeEncode = json_encode($informeGeneralAct);
           // echo $_POST['puesto'];
            echo $informeEncode;
        }
        if($_POST['R3'] === true){
            $nue = $_POST['nue'];           
            $informeGeneralAct = getActividadesByFiltroNue($fechaInicio, $fechaFinal, $nue);
            $informeEncode = json_encode($informeGeneralAct);
            echo $informeEncode;
        }  
          
>>>>>>> 7a163bc29d90b8ba8ea055e596c8ecaf3b37044e
?>
