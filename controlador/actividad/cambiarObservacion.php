<?php
    include '../../modelo/actividad.php';  

    
    if(isset($_GET['observacion'])){
        if(isset($_GET['idAct'])){
            $id=$_GET['idAct'];
        $obs = $_GET['observacion'];
        $resul = updateObservacion($obs, $id);
        $encode = json_encode($resul);
        echo $encode;
    }   
}
?>