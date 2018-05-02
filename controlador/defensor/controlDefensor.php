<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_def = $_POST['id_defensor'];
   
    
    //$listaDef = listar_defensores();
    $defensorX = getDefensorById($id_def);//obtenerDefensorCedula($cedulaProf);
    //echo $cedulaProf .' <= => '. count($defensorX);

    $defensorZ = json_encode($defensorX);
    echo $defensorZ;

?>