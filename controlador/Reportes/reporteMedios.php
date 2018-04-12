
<?php

include "../conexion.php";
$sql = "SELECT nom_usu, nombres_usu, ape_paterno_usu ,ape_materno_usu from usuario where id_perfil ='1' and estatus ='1'";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$datos = array();
$i = 0;
$j = 0;
$sql0 = "select * from medios where estatus='1' ";
$ejecutar_consulta0 = $conexion->query(utf8_decode($sql0));
$medios = array();
$idmedios = array();
while ($registro = $ejecutar_consulta0->fetch_assoc()) {
    $medios[$i] = utf8_encode($registro["medio"]);
    $idmedios [$i] = utf8_encode($registro["id_medio"]);
    $i++;
}
//echo json_encode($idmedios);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    $codigovendedor = utf8_encode($registro["nom_usu"]);
    $nombre = utf8_encode($registro["nombres_usu"]);
    $apellidop = utf8_encode($registro["ape_paterno_usu"]);
    $apellidom = utf8_encode($registro["ape_materno_usu"]);
    $tem = array("#" => $j + 1,
        "codigo vendedor" => $codigovendedor,
        "nombre" => $nombre,
        "primer apellido" => $apellidop,
        "segundo apellido" => $apellidom
    );
    for ($index = 0; $index < count($medios); $index++) {
        $sql2 = "SELECT COUNT( *) as total from prospeccion p "
                . "inner JOIN detalle_prospeccion d on p.curp = d.curp   "
                . "where p.id_medio = '$idmedios[$index]' and d.nom_usu='$codigovendedor'";
        $ejecutar = $conexion->query(utf8_decode($sql2));
        $reg = $ejecutar->fetch_assoc();        
        $tem[$medios[$index]] = utf8_encode($reg["total"]);
    }
    $datos[$j] = $tem;
    $j++;
    /*
      $telefono = utf8_encode($registro["telefono"]);
      $estado_civil = utf8_encode($registro["estado_civil"]);
      $ocupacion = utf8_encode($registro["ocupacion"]);
      $calle = utf8_encode($registro["calle_direccion"]);
      $numero = utf8_encode($registro["numero_direccion"]);
      $cp = utf8_encode($registro["codigo_postal"]);
      $colonia = utf8_encode($registro["colonia"]);
      $sexo = utf8_encode($registro["sexo"]);
      $nacimient = utf8_encode($registro["fecha_nacimiento"]);
      $afiliacion = utf8_encode($registro["fecha_inicio"]);

     */
}
echo json_encode($datos);

