<?php 
include '../../modelo/expediente.php';
    $id_defensor = $_POST['usuarios'];
    $id_expediente= $_POST['expedienteNum']; 
    $asigna= updateExpediente($id_defensor, $id_expediente);
    DeleteNotificacion($id_expediente);
    //echo $expedientes;    
    session_start();
    $_SESSION['post_data'] = 1; 
 header('Location: ../../vistas/administrador/index.php');
    //echo '<script>$("#dialogoCambio").dialog("close")</script>';
?>