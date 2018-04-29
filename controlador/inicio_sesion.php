<?php
include "conexion.php";

$usuario = $_POST["usuario_txt"];
$pass =  $_POST["password_txt"];
$sql = "SELECT * FROM usuario_sistema WHERE username='$usuario'";
$ejecutar_consulta = $conexion->query($sql);
$num_regs = $ejecutar_consulta->num_rows;
//echo 'USER=> '.$usuario . ' PASS=> '. $pass;
 //echo "<input type='button' onclick='alert('USER=> '.$usuario . ' PASS=> '. $pass)'/>";
if ($num_regs == 0) { //no encontro ningun registro con ese nombre usuario
    echo '<p class="text-danger"><strong>No existe ninguna cuenta vinculada a ' . $usuario . '</strong></p>';
} else { //encontro registro sobre un usuario y ese username
    $arrayUser = $ejecutar_consulta -> fetch_assoc();//contiene informacion del usuario en un array
    $passHashed = $arrayUser["password"];// obtiene la Contrasenia del usuario en la BD
    if(password_verify($pass, $passHashed)){//verifica las contraseñas si son correctas entra al if
      $sqlRol = "select id_cargo from personal as p inner join usuario_sistema as u on p.id_personal = u.id_personal where u.username = '$usuario'";
      $ejecutar_consulta = $conexion->query($sqlRol);
      $temp = $ejecutar_consulta->fetch_assoc();
      $id_cargo = $temp['id_cargo'];
      $estado = $arrayUser['estado'];
      $nombreUsuario = $arrayUser['username'];
      //echo $id_cargo . ' ' . $estado . ' ' . $nombreUsuario;
      if($estado == 1){
          //inicia sesion ?
          session_start();
          $_SESSION["autentificado"] = true;//queda autenticado
      //  echo $_SESSION["autentificado"] . ' valor autentificado de inicio_sesion';
          //echo"<script language='javascript'>alert( 'autentificado inicio_sesion=> ' +  ". $_SESSION['autentificado'].")</script>";
          $_SESSION["usuario"] = $nombreUsuario; // se asigna el nombre del usuario a la session
          $_SESSION["rol"] = $id_cargo; //asignamos rol de usuario /admin =1, coordinado =2, defensor =3
           $_SESSION["mensaje"] = "  ";
          //echo $_SESSION["usuario"] . ' => rol '.$_SESSION["rol"];
          echo'<script language="javascript">window.location="Vistas/baseIndex.php"</script>';
            //header("Location: ../Vistas/baseIndex.php");
      }else{
          echo '<p class="text-danger"><strong>Cuenta inactiva contacta al administrador</strong></p>';
      }
    }else{
        echo '<p class="text-danger"><strong>Contraseña incorrecta '.$pass.'</strong></p>';
    }
}
?>
