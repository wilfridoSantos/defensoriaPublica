<?php
include "../controlador/sesion.php";
  //print_r( $_SESSION[session_name()]+" abcde123
  //echo $_SESSION["usuario"] . ' => rol '.$_SESSION["rol"];

    //echo"<script language='javascript'>alert( ' autentificado baseIndex=>'+ $_SESSION['autentificado'])</script>";
    //echo"<script language='javascript'>alert( 'autentificado baseIndex=> rol ' +  ". $_SESSION['rol'].")</script>";

  if($_SESSION["autentificado"] == true){
  if ($_SESSION["rol"] == 1) {//ROL -1- => ADMINISTRADOR cesar aspra
      //header("Location: administrador/index.php");
      echo'<script language="javascript">window.location="administrador/index.php"</script>';
  }
  if ($_SESSION["rol"] == 2) {//ROL -2- => COORDINADOR cordinador1 1234
      //header("Location: coordinador/index.php");
      echo'<script language="javascript">window.location="coordinador/index.php"</script>';
  }

}else{
    header("Location: ../index.php");
  }
?>
