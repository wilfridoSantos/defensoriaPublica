<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
<<<<<<< HEAD
    $id_defensor = $_POST['id_personal'];
=======
    $id_defensor = $_POST['id_defensor'];
>>>>>>> 9d9acbccfc78c818e14c9a2b6b907456de52259c
    //actualizar datos del defensor
    $defensor = getDefensorUpdate($id_defensor);//obtenerDefensorCedula($cedulaProf);
    //print_r( $defensor);
    $defensorEncode = json_encode($defensor);
    echo $defensorEncode;
?>