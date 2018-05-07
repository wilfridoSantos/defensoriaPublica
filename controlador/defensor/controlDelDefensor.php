<?php 
    include '../../modelo/defensor/defensor.php';
    $id_defensor = $_GET['id_defensor'];
    $eliminarDefensor = eliminar_defensor($id_defensor);
    $listar = listar_defensores();  
    if(!isset($_GET['tipo'])){         
       session_start();
       $_SESSION['mensaje'] = "Se ha eliminado defensor exitosamente";
       echo $eliminarDefensor;
    }else{
        echo "json";
    }
?>