<?php

 $valor = $_POST["valor"];
include("../conexion.php");
if ($valor == "3") {
    $consulta = "SELECT * FROM perfil where id_perfil ='$valor' or id_perfil = '2'  ORDER BY tipo_perfil";
    $ejecutar_consulta = $conexion->query($consulta);
    echo '<select id="cargo_slc" class="form-control" name="cargo_slc" onchange="generarUsuario()">';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $idSucursal = utf8_encode($registro["id_perfil"]);
        $perfil = utf8_encode($registro["tipo_perfil"]);
        echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
    }
    echo '</select>';
}
if ($valor == "2") {
    $consulta = "SELECT * FROM perfil where  id_perfil = '1'  ORDER BY tipo_perfil";
    $ejecutar_consulta = $conexion->query($consulta);
    echo '<select id="cargo_slc" class="form-control" name="cargo_slc" onchange="generarUsuario()">';
    while ($registro = $ejecutar_consulta->fetch_assoc()) {
        $idSucursal = utf8_encode($registro["id_perfil"]);
        $perfil = utf8_encode($registro["tipo_perfil"]);
        echo '<option value="' . $idSucursal . '">' . $perfil . '</option>';
    }
    echo '</select>';
}






