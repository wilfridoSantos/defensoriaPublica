<?php

$usuario = $_POST["usuario"];
$password = $_POST["password"];
include './encriptador.php';
include './conexion.php';
$passEncriptada = encriptar($password);
$sql = "select * from usuario where nom_usu ='$usuario' and password = '$passEncriptada'";
$ejecutar = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar->num_rows;
if ($num_regs > 0) {
    echo true;
} else {
    echo false;
}

