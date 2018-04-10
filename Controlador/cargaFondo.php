<?php

error_reporting(0);

function imagenFondo()
{
    $respuesta = null;
    if (isset($_FILES["file"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            $data      = base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
            $datos     = "data:" . $check["mime"] . ";base64," . $data;
            $respuesta = $datos;
        } else {
            $respuesta = 'error';
        }
    }
    return $respuesta;
}
echo imagenFondo();
