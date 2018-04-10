<?php

$valor = $_POST["id"];

include("../conexion.php");
$sql = "select lote,manzana from  departamentos where id_fraccionamiento ='$valor'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$i = 0;
$reg = array();
$lote = "";
$manzana = "";
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $lote = utf8_encode($registro["lote"]);
    $manzana = utf8_encode($registro["manzana"]);
    break;
}

if ($lote == "0") {
    $sql = "select manzana from  departamentos where id_fraccionamiento ='$valor' GROUP BY manzana";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    echo '<label class="control-label col-md-1">Manzana</label>';
    echo '<br><br><div class="col-md-12" >';
    echo '<select id="lotes_slc" class="form-control" name="lotes_slc" onchange="cargarNumeros()" >';
    echo '<option value=null>--Manzanas--</option>';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $result = utf8_encode($registro["manzana"]);
        echo '<option value="' . $result . '">' . $result . '</option>';
    }
    echo '</select>';
    echo '</div>';
} else {
    $sql = "select lote from  departamentos where id_fraccionamiento ='$valor' GROUP BY lote";
    $ejecutar_consulta = $conexion->query(utf8_decode($sql));
    echo '<label class="control-label col-md-1">Lote</label>';
    echo '<br><br><div class="col-md-12">';
    echo '<select id="lotes_slc" class="form-control" name="lotes_slc" onchange="cargarNumeros()" >';
    echo '<option value=null>--Lotes--</option>';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $result = utf8_encode($registro["lote"]);
        echo '<option value="' . $result . '">' . $result . '</option>';
    }
    echo '</select>';
    echo '</div>';
}




