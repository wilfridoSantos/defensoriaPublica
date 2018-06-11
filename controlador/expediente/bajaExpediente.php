<?php 
    include '../../modelo/expediente.php';
    $id_expediente = $_POST['expedienteNum'];
    $motivacion = $_POST['causa'];

    $bajaExpediente = bajaExpediente($id_expediente, $motivacion);
    session_start();
    $_SESSION['post_data'] = 1; 
    header('Location: ../../vistas/administrador/index.php');
?>