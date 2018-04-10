<?php
include("../conexion.php");
$valor =$_POST["id"];
$sql ="select nom_usu from detalle_prospeccion where curp='$valor'";
$ejecutar= $conexion->query($sql);
$reg= $ejecutar->fetch_assoc();
$asesor = utf8_encode($reg["nom_usu"]);
$consulta = "SELECT * FROM usuario where id_perfil='1' ORDER BY nombres_usu";
$ejecutar_consulta = $conexion->query($consulta);
echo '<select id="asesor_slc" class="form-control" name="" >';
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $id = utf8_encode($registro["nom_usu"]);
    $perfil = utf8_encode($registro["nombres_usu"])
            .' '.utf8_encode($registro["ape_paterno_usu"])
            .' '. utf8_encode($registro["ape_materno_usu"]) ;
    if($id==$asesor){
        echo '<option  selected value="' . $id . '">' . $perfil . '</option>';
    }else{
        echo '<option  value="' . $id . '">' . $perfil . '</option>';
    }
    
}
echo '</select>';
$conexion->close();
