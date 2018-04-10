<?php

$usuario = $_POST["curp"];
$nombre = $_POST["documento"];

include("../conexion.php");
$consulta = "SELECT id_documento from tipo_documentos where nombre_documento ='$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
$identificador = utf8_encode($registro['id_documento']);
$destino = "../../pdf/" . $usuario . "-" . $identificador . ".pdf";
if (unlink($destino)) {
    $consulta = "DELETE doc from  documentos doc INNER JOIN tipo_documentos tip on tip.id_documento = doc.id_documento where doc.id_prospecto ='$usuario' and  tip.nombre_documento='$nombre'";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        echo 'se elimino ' . $nombre . " con exito";
    } else {
        
    }
}else{
    echo 'Error al eliminar' . $nombre;
}

$conexion->close();



