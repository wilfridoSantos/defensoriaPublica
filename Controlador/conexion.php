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

$conexion = conectarse();
