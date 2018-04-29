<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_def = $_POST['numCedula'];
   
    
    //$listaDef = listar_defensores();
    $defensorX = obtenerExpedientes($id_def);//obtenerDefensorCedula($cedulaProf);
    //echo $cedulaProf .' <= => '. count($defensorX);

    $defensorZ = json_encode($defensorX);
    echo $defensorZ;

?>