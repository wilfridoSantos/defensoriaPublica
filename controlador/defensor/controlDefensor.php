<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_def = $_GET['id_defensor'];
    $defensorX = getDefensorById($id_def);//obtenerDefensorCedula($cedulaProf);
    $defensorZ = json_encode($defensorX);
    echo $defensorZ;
?>