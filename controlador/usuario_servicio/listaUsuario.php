<?php 
    include_once('../../modelo/usuarioServicio.php');
    
    if($_GET['id_usuario_servicio']){
        $listaUser = listar_usuarios_id($_GET['id_usuario_servicio']);
        $contenido = json_encode($listaUser);
        echo $contenido;
    }
    
?>