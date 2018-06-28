<?php
    include '../../modelo/actividad.php';  

    $inicio =  $_POST['ini'];  
    $final =  $_POST['fin'];  
    $sys =  $_POST['sistema'];  
    $con=  $_POST['consulta'];  
    
    $resultCon = getActividadesConsulta($inicio, $final, $sys);
    /* switch($con){
        case 'NUM': 

        break;
    } */
    $encode = json_encode($resultCon);
    echo $encode;      
?>