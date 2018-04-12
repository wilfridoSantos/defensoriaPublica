<?php
include "../Controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123
  //echo $_SESSION["usuario"] . ' => rol '.$_SESSION["rol"];

    //echo"<script language='javascript'>alert( ' autentificado baseIndex=>'+ $_SESSION['autentificado'])</script>";
    echo"<script language='javascript'>alert( 'autentificado baseIndex=> rol ' +  ". $_SESSION['rol'].")</script>";

  if($_SESSION["autentificado"] == true){
  if ($_SESSION["rol"] == 1) {//ROL -2- => COORDINADOR
      //header("Location: Administrador/index.php");
      echo'<script language="javascript">window.location="Administrador/index.php"</script>';
  }
  if ($_SESSION["rol"] == 2) {//ROL -2- => COORDINADOR
      //header("Location: Coordinador/index.php");
        echo'<script language="javascript">window.location="Coordinador/index.php"</script>';
  }
  if ($_SESSION["rol"] == 3) {//ROL -3- => DEFENSOR
    //header("Location: Defensor/index.php");
      echo'<script language="javascript">window.location="Defensor/index.php"</script>';
  }}else{
    header("Location: ../index.php");
  }
?>
