<?php

$nombre = $_POST["credito"];
$descripcion = $_POST['descripcion'];


include "../conexion.php";
$consulta = "select * from creditos where credito = '$nombre'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;
$mensaje = 0;
$resp= false;
if ($num_regs == 0) {
    $consulta = "INSERT INTO creditos "
            . "(credito,descripcion, estatus) VALUES "
            . "('$nombre', '$descripcion',1)";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
    if ($ejecutar_consulta) {
        //ingresado con exito
        $resp=true;
        $mensaje = "<p class='text-success'><strong>Tipo de credito " . $nombre . " agregado con exito</strong></p>";
    } else {
        //error en el servidor
        $mensaje = "<p class='text-danger'><strong>Error en el servidor intente más tarde</strong></p>";
    }
} else {
    //credito ya existe
    $mensaje = "<p class='text-danger'><strong>El credito " . $nombre . " ya esta registrado</strong></p>";
}
$result = array($mensaje,$resp);
echo json_encode($result);
