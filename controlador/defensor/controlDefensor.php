<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_def = $_GET['id_personal'];
    $defensorX = getDefensorById($id_def);//obtenerDefensorCedula($cedulaProf);
    //$defensorX = getImagenById($id_def);
    //$content = $defensorX['foto'];
    //header( 'Content-type: image/jpg');
    //echo $content;
    $defensorZ = json_encode($defensorX);
    echo $defensorZ;
?>