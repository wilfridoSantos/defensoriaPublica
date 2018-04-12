<?php

$usuario = $_POST["valor"];
$estado = $_POST["tipo"];

function editar($usu,$tip) {
    include("../conexion.php");
    if($tip==1){
        $consulta ="UPDATE tipo_documentos SET estatus = '0' WHERE id_documento = '$usu' ";
    }else{
        $consulta ="UPDATE tipo_documentos SET estatus = '1' WHERE id_documento = '$usu' ";
    }
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    return $ejecutar_consulta;
}

echo editar($usuario, $estado);
