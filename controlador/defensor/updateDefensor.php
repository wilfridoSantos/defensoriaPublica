<?php 
    
    include '../../modelo/defensor/defensor.php';
    //echo $_GET['cedula'];
<<<<<<< HEAD
    $id_defensor = $_POST['id_personal'];
=======
    $id_defensor = $_POST['id_defensor'];
>>>>>>> acfcd337647c416ca3ae3f7b30f9b0b755ac9dfe
    //actualizar datos del defensor
    $defensor = getDefensorUpdate($id_defensor);//obtenerDefensorCedula($cedulaProf);
    $defensorEncode = json_encode($defensor);
    echo $defensorEncode;
?>