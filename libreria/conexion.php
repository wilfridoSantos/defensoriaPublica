<?php
/*
function conectarse()
{
    $servidor = "localhost";
    $usuario  = "root";
    $password = "";
    $bd       = "bddefensoria";

    $conectar = new mysqli($servidor, $usuario, $password, $bd);
    return $conectar;
}
function consulta($sql, $conexion){
   // $resultado = mysqli_query($conexion, $sql)or die(mysqli_error($conexion));
    $resultado = $conexion->query($sql);
    return $resultado;
 }

$conexion = conectarse();*/
?>

<?php

define('BD_SERVIDOR', '127.0.0.1');
define('BD_NOMBRE', 'bddefensoria');
define('BD_USUARIO', 'root');
define('BD_PASSWORD', '');

$db = new PDO("mysql:host=".BD_SERVIDOR.";dbname=".BD_NOMBRE.";charset=utf8",BD_USUARIO,BD_PASSWORD);


function consulta($consulta){
    global $db;
    $sql = $db->prepare($consulta);
   $sql->execute();  
   
  $datos = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $datos;

 }
 function registro($consulta){
   global $db;
   $sql=$db->prepare($consulta);
   $sql->execute();
 }

?>