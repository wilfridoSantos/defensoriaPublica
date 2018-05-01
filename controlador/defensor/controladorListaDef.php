<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo '<script>alert('.$_GET['mensaje'].') </script>';
    $listaDef = listar_defensores();
   

    $num_regs = count($listaDef);//$listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
       // echo '<p class="text-danger"><strong>Aun no existen defensores agregados al sistema</strong></p>';
    }else{
       // print_r($listaDef);
        $contenido = json_encode($listaDef);
    }

?>