<?php
include '../conexion.php';
$idcontrato = $_POST["id"];
$consulta = "update contrato set id_proceso_adqusicion='2' "
        . " where id_contrato='$idcontrato'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if($ejecutar_consulta){
    echo 'Escritura aprobada con éxito';
}else{
    echo 'Error en el servidor intente más tarde';
}