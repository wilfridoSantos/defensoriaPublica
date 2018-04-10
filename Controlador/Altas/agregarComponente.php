<?php

include '../conexion.php';
$valor  = $_POST["valor"];
$radio  = $_POST["radio"];
$ancho  = $_POST["ancho"];
$alto   = $_POST["alto"];
$fuente = $_POST["fuente"];
$borde  = $_POST["border"];

$sql               = "SELECT * FROM componente_fraccinamiento where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_encode($sql));
$num_regs          = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
    $sql = "INSERT INTO componente_fraccinamiento "
        . "(id_fraccionamiento,radio,border,ancho,alto,tam_fuente) VALUES "
        . "('$valor','$radio','$borde','$ancho','$alto','$fuente' )";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se agrego el componente</strong></p>';
    } else {
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
} else {
    $registro     = $ejecutar_consulta->fetch_assoc();
    $idcomponente = utf8_encode($registro["id_componente"]);
    $sql          = "UPDATE componente_fraccinamiento set radio='$radio', border = '$borde',"
        . "ancho ='$ancho',alto='$alto',tam_fuente='$fuente' where id_componente= '$idcomponente'";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    if ($ejecutar_consulta) {
        echo '<p  class="text-success" ><strong>se actualizo el componente</strong></p>';
    } else {
        echo '<p  class="text-danger" ><strong>Error</strong></p>';
    }
}
