<?php
include "../libreria/conexion.php";

$usuario = $_POST["usuario_txt"];
$pass =  $_POST["password_txt"];
$sql = 'SELECT * FROM usuario_sistema WHERE username='.$usuario;
$num_regs = registro($sql); // $conexion->query($sql);
//$num_regs = $ejecutar_consulta->num_rows;
//echo 'USER=> '.$usuario . ' PASS=> '. $pass;
 //echo "<input type='button' onclick='alert('USER=> '.$usuario . ' PASS=> '. $pass)'/>";
if ($num_regs == 0) { //no encontro ningun registro con ese nombre usuario
    echo '<p class="text-danger"><strong>No existe ninguna cuenta vinculada a '.$usuario.'  </strong></p>';
} else { //encontro registro sobre un usuario y ese username
    $arrayUser = consulta($sql);//$ejecutar_consulta -> fetch_assoc();//contiene informacion del usuario en un array
    print_r( $arrayUser);
    $passHashed = $arrayUser[0]['password'];// obtiene la Contrasenia del usuario en la BD
    if(password_verify($pass, $passHashed)){//verifica las contraseñas si son correctas entra al if
        $sqlRol = 'select id_cargo from personal where nue ='.$usuario;
        //$consultaRol = $conexion->query($sqlRol);
        $num_regis = registro($sqlRol);//$consultaRol->num_rows;
        if($num_regis == 1){
            //$ejecutar_consulta =//$conexion->query($sqlRol);
            $temp = consulta($sqlRol);// $ejecutar_consulta->fetch_assoc();
            $id_cargo = $temp[0]['id_cargo'];
            $estado = $arrayUser[0]['estado'];
            $nombreUsuario = $arrayUser[0]['username'];
            //echo $id_cargo . ' ' . $estado . ' ' . $nombreUsuario;
            if($estado == 1){
                session_start();
                $_SESSION["autentificado"] = true;//queda autenticado          
                $_SESSION["usuario"] = $nombreUsuario; // se asigna el nombre del usuario a la session
                $_SESSION["rol"] = $id_cargo; //asignamos rol de usuario /admin =1, coordinado =2, defensor =3
                 $_SESSION["mensaje"] = 'Bienvenido usuario: '.$nombreUsuario;
                echo'<script language="javascript">window.location="Vistas/baseIndex.php"</script>';
                //header("Location: ../Vistas/baseIndex.php");
            }else{
                 echo '<p class="text-danger"><strong>Cuenta inactiva contacto al administrador</strong></p>';
            }
        }else{
            echo '<p class="text-danger"><strong>No existe ninguna cuenta vinculada a ' . $usuario . '</strong></p>';
        }
    }else{
        echo '<p class="text-danger"><strong>Contraseña incorrecta ******</strong></p>';
    }
}
?>
