<?php 
    include_once('../../modelo/usuarioServicio.php');
    $listaUser = listar_usuarios();
    $contenido = json_encode($listaUser);

    
?>