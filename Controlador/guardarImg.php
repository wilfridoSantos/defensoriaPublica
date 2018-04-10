<?php

$ruta = $_FILES['img']['tmp_name'];
$destino = "../assets/fondos/default.jpg";
if (copy($ruta, $destino)) {
    echo '<p class="text-success"><strong>Guardado con exito cierra y abre sesión para actualizar fondo</strong></p>';
} else {
    echo '<p class="text-danger"><strong>Error al guardar</strong></p>';
}


