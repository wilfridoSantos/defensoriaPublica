<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_defensor = $_POST['id_defensor'];

    //actualizar datos del defensor
    $defensor = getDefensorById($id_defensor);//obtenerDefensorCedula($cedulaProf);
    $defensorEncode = json_encode($defensor);
   
    echo $defensorEncode;

?>