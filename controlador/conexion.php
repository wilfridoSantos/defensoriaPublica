<?php

function conectarse()
{
    $servidor = "localhost";
    $usuario  = "root";
    $password = "";
    $bd       = "bddefensoria";

    $conectar = new mysqli($servidor, $usuario, $password, $bd);
    return $conectar;
}
function consulta($sql, $conexion){
   // $resultado = mysqli_query($conexion, $sql)or die(mysqli_error($conexion));
    $resultado = $conexion->query($sql);
    return $resultado;
 }
 
$conexion = conectarse();
