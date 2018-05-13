<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
    $id_defensor = $_POST['id_personal'];
<<<<<<< HEAD
    //actualizar datos del defensor
=======
>>>>>>> a05e837c99fd66770c52e73620bedf5b1bf496b6
    $defensor = getDefensorUpdate($id_defensor);//obtenerDefensorCedula($cedulaProf);
    //print_r( $defensor);
    $defensorEncode = json_encode($defensor);
    echo $defensorEncode;
?>