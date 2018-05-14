<?php 
    include '../../modelo/defensor/defensor.php';
    $id_defensor = $_GET['id_personal'];
    $eliminarDefensor = eliminar_defensor($id_defensor);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"Se ha eliminado satisfactoriamente."];
    //print_r($actualizaDefensor);      
    if(!isset($_GET['tipo'])){
        session_start();
         $_SESSION['mensaje'] = $mensaje;
         echo $eliminar_defensor;
     }
     
?>
