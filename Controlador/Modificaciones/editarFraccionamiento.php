<?php
include '../conexion.php';
$ubicacion = $_POST["ubicacion"];
$cambio = $_POST["cambio"];
$file;
$datosLogo;
$id = $_POST["id"];
$mensaje="";
$resultado=array();
$consulta;
if($cambio=="true"){
    $file =$_FILES["logo"]['tmp_name'];
    $datosLogo = base64codificador($file);
    $consulta = "update fraccionamientos set ubicacion_fraccionamiento='$ubicacion' , logo='$datosLogo' where id_fraccionamiento='$id'";
    $resultado[1]= $cambio;
    $resultado[2]=$datosLogo;
    $resultado[0]=$consulta;
}else{
    $consulta = "update fraccionamientos set ubicacion_fraccionamiento='$ubicacion'  where id_fraccionamiento='$id'";
    $resultado[1]= false;
    $resultado[2]="";
    
}
$ejecutar_consulta = $conexion->query(utf8_decode($consulta));
if ($ejecutar_consulta) {
    //ingresado con exito
    $mensaje = '<p  class="text-success" ><strong>actualizado con exito</strong></p>';
} else {
    //error en el servidor
    $mensaje = '<p  class="text-danger" ><strong>error en el servidor intente más tarde</strong></p>';
}
$resultado[0]=$mensaje;
function base64codificador($file) {
    $type = pathinfo($file, PATHINFO_EXTENSION);
    $data = file_get_contents($file);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
echo json_encode($resultado);