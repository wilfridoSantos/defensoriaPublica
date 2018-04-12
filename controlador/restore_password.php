<?php
$usuario=  $_POST["usuario_txt"];

include './conexion.php';
include './encriptador.php';
$sql =  "select * from usuario where username = '$usuario';
$ejecutar_consulta = $conexion->query($sql);
$num_regs = $ejecutar_consulta->num_rows;
if($num_regs==0){
    echo mensajeError("no tenemos registros de ".$usuario);
}else{
    $registro = $ejecutar_consulta->fetch_assoc();
    $password = utf8_encode(desencriptar($registro["password"]));
    $usuario = utf8_encode($registro["username"]);
    $nombre = utf8_encode($registro["username"]);
    $mensaje = "Hola ".$nombre." te adjuntamos tus datos..\nCorreo: "
            "\nUsuario: ".$usuario."\nContraseña: ".$password;
    $send= mail($correo, "Recuperar contraseña GESO", $mensaje);
    if($send){
        echo mensajeSuccess("Se te envio tu contraseña a ".$correo);
    }else{
        echo mensajeError("error al enviar correo intente mas tarde");
    }
    
}
function mensajeError($msj){     
    return '<p class="text-danger"><strong>'.$msj.'</strong></p>';
}
function mensajeSuccess($msj){
    return '<p class="text-success"><strong>'.$msj.'</strong></p>';
}
