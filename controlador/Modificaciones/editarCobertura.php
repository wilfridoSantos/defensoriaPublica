
<?php

$nombre = $_POST["nombre"];
$descripcion = $_POST['descripcion'];
$costo = $_POST["costo"];
$descuento = $_POST["descuento"];
$id = $_POST['id'];
include "../conexion.php";
$mensaje = "";
$consulta = "update cobertura_seguro set tipo_de_cobertura='$nombre'"
        . ", descripcion_cobertura ='$descripcion', "
        . " costo_por_anio='$costo', descuento_por_anio ='$descuento'"
        . "  where id_cobertura_seguro='$id'";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    //ingresado con exito
    $mensaje = '<p  class="text-success" ><strong>'
            . 'Editado con exito</strong></p>';
} else {
    //error en el servidor
    $mensaje = '<p  class="text-danger" ><strong>'
            . 'Error en el servidor intente mas tarde</strong></p>';
}
echo $mensaje;


