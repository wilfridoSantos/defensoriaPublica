<?php
include_once '../../modelo/usuarioServicio.php';
    $id_expediente = $_GET['id_expediente'];
    $informacion = getUsuarioServicioById($id_expediente);
    $encode = json_encode($informacion);
    echo $encode;   
?>