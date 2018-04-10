<?php
include '../conexion.php';
$id=$_POST["valor"];
$sql = "SELECT * FROM contrato c 
inner JOIN prospeccion p on c.prospecto = p.curp 
INNER JOIN detalle_prospeccion d  on c.prospecto = d.curp 
inner join usuario u on d.nom_usu= u.nom_usu 
inner join departamentos f on f.id_departamento = c.id_departamento 
inner join fraccionamientos g on g.id_fraccionamiento = f.id_fraccionamiento
INNER JOIN estado_civil ec on ec.id_estado_civil = p.id_estado_civil
INNER JOIN ocupaciones oc on oc.id_ocupacion = p.id_ocupacion
INNER JOIN sucursales suc on suc.id_sucursal = u.id_sucursal
where c.id_departamento='$id';";
$ejecutar_consulta = $conexion->query(utf8_decode($sql));
$registro = $ejecutar_consulta->fetch_assoc();
$estatus = utf8_encode($registro["estado_contrato"]);
if ($estatus == "0") {
    $idcontrato= utf8_encode($registro["id_contrato"]);
    $consulta = "update contrato set estado_contrato='1' "
            . " where id_contrato='$idcontrato'";
    $ejecutar_consulta = $conexion->query(utf8_decode($consulta));
}
$datos = array(
    utf8_encode($registro["prospecto"]),
    utf8_encode($registro["nombres"]),
    utf8_encode($registro["apellido_paterno"]),
    utf8_encode($registro["apellido_materno"]),
    utf8_encode($registro["telefono"]),
    utf8_encode($registro["estado_civil"]),
    utf8_encode($registro["ocupacion"]),
    utf8_encode($registro["nom_usu"]),
    utf8_encode($registro["nombres_usu"]),
    utf8_encode($registro["ape_paterno_usu"]),
    utf8_encode($registro["ape_materno_usu"]),
    utf8_encode($registro["telefono_usu"]),
    utf8_encode($registro["correo_usu"]),
    utf8_encode($registro["nombre_suc"]),
    utf8_encode($registro["nombre_fraccionamiento"]),
    utf8_encode($registro["lote"]),
    utf8_encode($registro["manzana"]),
    utf8_encode($registro["calle"]),
    utf8_encode($registro["numero"]),
    utf8_encode($registro["costo_departamento"]),
    utf8_encode($registro["id_seguro"]),
    utf8_encode($registro["estado_contrato"]),
    utf8_decode($registro["fecha_contrato"])
);
echo json_encode($datos);

