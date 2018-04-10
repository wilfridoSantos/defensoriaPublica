<?php

include('conexion.php');
$usu = $_SESSION["usuario"];
$consulta = "SELECT * FROM usuario WHERE nom_usu = '$usu'";
$ejecutar_consulta = $conexion->query($consulta);
$registro = $ejecutar_consulta->fetch_assoc();
$datos = $registro['foto'];

$conexion->close();
echo "<img src='$datos' alt='user-picture' class='img-responsive img-circle center-box'>";
?>