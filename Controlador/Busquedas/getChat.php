<?php

$usuario = $_POST["usuario1"];
$usuario2 = $_POST["usuario2"];


include "../conexion.php";
$consulta0 = "UPDATE mensajeria SET leido='1' WHERE remitente='$usuario2' and destinatario='$usuario'";
$ejecutar_consulta0 = $conexion->query(utf8_encode($consulta0));
$consulta = "SELECT * FROM mensajeria INNER JOIN usuario ON mensajeria.remitente = usuario.nom_usu WHERE remitente ='$usuario' and destinatario = '$usuario2' or remitente ='$usuario2' AND destinatario='$usuario';";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));

while ($registro = $ejecutar_consulta->fetch_assoc()) {
    if (utf8_encode($registro["remitente"]) === $usuario2) {
        echo '<li class="right clearfix"><span class="chat-img pull-right"><img src="' . $registro["foto"]
        . '" style="width: 50px; height :50px;" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix">' .
        '<div class="header">' . '<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>' . utf8_encode($registro["fecha_msj"])
        . '</small><strong class="pull-right primary-font">' . utf8_encode($registro["nombres_usu"]) . "&nbsp;" . utf8_encode($registro["ape_paterno_usu"]) .
        '</strong> </div> <p>' . utf8_encode($registro["mensaje_txt"]) . ' </p> </div> </li>';
    } else {
        echo '<li class="left clearfix"><span class="chat-img pull-left"><img src = "' . $registro["foto"]
        . '" style="width: 50px; height :50px;" class = "img-circle"/></span><div class = "chat-body clearfix" ><div class = "header" ><strong class = "primary-font" >' .
        utf8_encode($registro["nombres_usu"]) . "&nbsp;" . utf8_encode($registro["ape_paterno_usu"]) .
        '</strong><small class="pull-right text-muted"><span class = "glyphicon glyphicon-time"></span>'
        . utf8_encode($registro["fecha_msj"]) . '</small></div><p>' . utf8_encode($registro["mensaje_txt"]) . '</p></div></li>';
    }
}
