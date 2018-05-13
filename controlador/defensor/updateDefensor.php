<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_defensor = $_POST['id_personal'];
    //actualizar datos del defensor
    $defensor = getDefensorUpdate($id_defensor);//obtenerDefensorCedula($cedulaProf);
    //print_r( $defensor);
    $defensorEncode = json_encode($defensor);
    echo $defensorEncode;
?>