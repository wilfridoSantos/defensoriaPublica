<?php
include '../conexion.php';
$idcontrato = $_POST["id"];
 $consulta = "update contrato set estado_contrato='2' "
        . " where id_contrato='$idcontrato'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta){
    echo 'Contrato aprobado con éxito';
}else{
    echo 'Error en el servidor intente más tarde';
}
