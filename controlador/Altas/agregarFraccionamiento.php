<?php

$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$plano = $_FILES["plano"]['tmp_name'];
$logo = $_FILES["logo"]['tmp_name'];
$ancho = $_POST["ancho_plano"];
$alto = $_POST["alto_plano"];
$nombreplano = $_FILES["plano"]["name"];

include '../conexion.php';
$destino = "../../assets/modelos/" . $nombre . ".jpg";
$datosLogo = base64codificador($logo);
$nombretemp =$nombre.".jpg";
$sql = "select nombre_fraccionamiento from fraccionamientos WHERE nombre_fraccionamiento='$nombre'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$num_regs = $ejecutar_consulta->num_rows;
$res = false;
if ($num_regs == 0) {
    if (copy($plano, $destino)) {
        $sql = "INSERT INTO fraccionamientos "
                . "(nombre_fraccionamiento,ubicacion_fraccionamiento,plano,logo,estatus,ancho_plano,alto_plano) VALUES "
                . "('$nombre','$direccion','$nombretemp','$datosLogo',1,'$ancho','$alto')";

        $ejecutar_consulta = $conexion->query(utf8_decode($sql));
        if ($ejecutar_consulta) {
            //ingresado con exito
            $res = true;
            $mensaje = '<p  class="text-success" ><strong>Se registro el fraccionamiento ' . $nombre . ' con exito</strong></p>';
        } else {
            //error en el servidor
            $mensaje = '<p  class="text-danger" ><strong>Error en el servidor intente más tarde</strong></p>';
        }
    } else {
        //error en el servidor
        $mensaje = '<p  class="text-danger" ><strong>Error al cargar el archivo</strong></p>';
    }
} else {
    $mensaje = '<p  class="text-danger" ><strong>Ya se encuentra ese fraccionamiento</strong></p>';
}

function base64codificador($file) {
    $type = pathinfo($file, PATHINFO_EXTENSION);
    $data = file_get_contents($file);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}

$resutado = array($mensaje, $res);
echo json_encode($resutado);
