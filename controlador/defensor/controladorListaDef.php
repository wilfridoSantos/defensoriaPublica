<?php 
    header('Content-Type: application/json');
    include '../../modelo/defensor/defensor.php';

    
    $listaDef = listar_defensores();


    $num_regs = count($listaDef);//$listaDef->num_rows;
    if ($num_regs == 0) { //no encontro ningun registro 
        echo '<p class="text-danger"><strong>Aun no existen defensores agregados al sistema</strong></p>';
    }else{
       
    
   $contenido = json_encode($listaDef);
  // print_r($contenido);
 
      //  $json=json_encode($arrayDef);
        //print_r(  json_decode($json,true));
    //    echo json_encode($arrayDef);
    } 

?>