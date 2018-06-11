<?php 
    include '../../modelo/defensor/defensor.php';
    $id_defensor = $_GET['id_personal'];
    $eliminarDefensor = eliminar_defensor($id_defensor);
    echo json_encode($eliminarDefensor);
     
?>
