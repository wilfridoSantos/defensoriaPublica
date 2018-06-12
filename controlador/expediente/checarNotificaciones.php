<?php 
    include '../../modelo/expediente.php';
    $noti = checkNoti();
    print_r($noti);
    /* 
    session_start();
    $_SESSION['post_data'] = 1;  */
    //header('Location: ../../vistas/administrador/index.php');
?>