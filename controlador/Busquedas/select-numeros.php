<?php

$fracc = $_POST["fracc"];
$lote = $_POST["lote"];
include("../conexion.php");
$consulta = "select numero,id_departamento from  departamentos where id_fraccionamiento ='$fracc'  and (lote ='$lote' or manzana='$lote') ORDER BY numero";
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
echo '<label class="control-label col-md-1">Número</label>';
echo '<br><br><div class="col-md-12" >';
echo '<select id="numeros_slc" class="form-control" name="numeros_slc" onchange="caldularprecio()" >';
echo '<option value=null>--Números--</option>';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
     $iddept = utf8_encode($registro['id_departamento']);
    $sql = "select * from contrato where id_departamento ='$iddept' and estado_contrato !='3'";
    $ejecutar_consulta2 = $conexion->query(utf8_decode($sql));
    $num_regs = $ejecutar_consulta2->num_rows;
    if ($num_regs == 0) {
        $result = utf8_encode($registro["numero"]);
        echo '<option value="' . $result . '">' . $result . '</option>';
    }
}
echo '</select>';
echo '</div>';

