
<?php

error_reporting(0);

function guardaFondo() {
    $respuesta= null;
    if (isset($_FILES["file"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            $data = base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
            $datos = "data:" . $check["mime"] . ";base64," . $data;
            $nombre = $_POST["nombreTxt"];
            $respuesta = $nombre;
        } else {
            $respuesta = 'error';
        }
    }
    return $respuesta;
}
echo guardaFondo();