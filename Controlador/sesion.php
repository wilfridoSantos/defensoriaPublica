<?php
session_start();
echo 'entro a sesion.php';
//Evaluo que la sesion continue verificando una de las variables creadas en control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo de salir.php
if (!$_SESSION["autentificado"]) {
    header("Location: salir.php");
    echo 'Redireccionando a ssalir.php';
  //echo'<script language="javascript">window.location="../Controlador/salir.php"</script>';
}
?>
