<?php 
    include '../../modelo/expediente.php';
    $observacion = $_GET['observacion'];
    $id_respuesta = $_GET['id_respuesta'];

    $upObs = updateObservacionResp($id_respuesta,$observacion);
    echo json_encode($upObs);
    /* session_start();
    $_SESSION['post_data'] = 1; 
    header('Location: ../../vistas/administrador/index.php'); */
?>