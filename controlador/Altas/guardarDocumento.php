<?php

$mensaje = "";
$nombre = $_FILES['archivo']['name'];
$tamano = $_FILES['archivo']['size'];
$ruta = $_FILES['archivo']['tmp_name'];
$curp = $_POST["curp"];
$id = $_POST["id"];
$destino = "../../pdf/" . $curp . "-" . $id . ".pdf";
$destino2 = "pdf/" . $curp . "-" . $id . ".pdf";
$nombredoc = $_POST["nombre"];
if ($nombre != "") {
    include "../conexion.php";
    if (copy($ruta, $destino)) {
        $consulta = "select * from documentos where datos_documentos ='$destino2'";
        $ejecutar_consulta = $conexion->query($consulta);
        $num_regs = $ejecutar_consulta->num_rows;
        if ($num_regs == 0) {
            $consulta = "INSERT INTO documentos "
                    . "(datos_documentos,id_documento, id_prospecto) VALUES "
                    . "('$destino2', '$id','$curp')";
            $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
            if ($ejecutar_consulta) {
                $mensaje = "Documento " . $nombredoc . " guardado con exito";
            } else {
                $mensaje = "Error al guardar " . $nombredoc;
            }
        } else {
            $mensaje = "documento " . $nombredoc . " existente se sobreescribio";
        }
    } else {
        $mensaje = "Error al guardar";
    }
}

echo $mensaje;
