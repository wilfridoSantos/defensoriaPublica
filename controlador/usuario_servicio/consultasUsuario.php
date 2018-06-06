<?php
include_once '../../modelo/usuarioServicio.php';
    $id_usuario = $_GET['id_usuario_servicio'];
    $informacion = getUsuarioServicioById($id_usuario);
    $encode = json_encode($informacion);
    echo $encode;   
?>