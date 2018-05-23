<?php 
    header('Content-Type: application/json');
    include_once ('../../modelo/actividad.php');
    include_once('../../modelo/usuarioServicio.php');
    include_once('../../modelo/asesoria.php');
   
    $usuario_servicio=getUsuarioByCurp($_POST['curp'])[0]['id_usuario_servicio'];
    $dia_registro=split('[/.-]', $_POST['fechaRegistro'])[2];
    $mes_registro=split('[/.-]', $_POST['fechaRegistro'])[1];
    $anio_registro=split('[/.-]', $_POST['fechaRegistro'])[0];
    $actividad = Array(
           
            "id_personal_campo"          =>$_POST['id_personal'],
            "dia_registro"       =>$dia_registro,
            "mes_registro"       =>$mes_registro,
            "anio_registro"       =>$anio_registro,
            "id_usuario_servicio"  =>$usuario_servicio,
            "observacion"              =>$_POST['resultado']
           
     );
     //echo "actividad".$_POST["actividad"];
     crear_actividad($actividad);
     if($_POST["actividad"]=="asesoria"){
        $id_actividadRegistrado=ultimoActividadRegistrado();
       // echo "ACTIVIDAD". $id_actividadRegistrado;
        $asesoria = Array(
           
            "id_actividad"          =>$id_actividadRegistrado,
            "latitud"       =>"",
            "longitud"       =>"",
            "foto"       =>""
           
        );
        crear_asesoria($asesoria);

    }
    $mensaje=['tipo'=>"exito",
    'mensaje'=>"registro existoso"];
$dirigir="listar_Expediente";


if(isset($_GET['tipo'])){
        
    if($_GET['tipo']=="html"){

        session_start();
        // $_SESSION['mensaje'] = "registro exitoso";
       //  $_SESSION['mensaje'] = $mensaje;
         //$_SESSION['dirigir'] = $dirigir;
        // echo $mensaje['mensaje'];
      header("location: ../../vistas/coordinador/index.php");
     }
     else{
          header('Content-Type: application/json');
         echo "json";
     }
    }
      
     
      
?>