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
      // print_r($actividad);

    }
    //////// CUANDO ES EJECUCION DE SANCIONES SE DEBE DE REGISTRAR LA FECHA EN QUE SE CREO EL EXPEDIENTE
    /* $mensaje=['tipo'=>"error",
    'mensaje'=>"expediente ya existe"];
    $dirigir="asignar_defensor";
    if((listar_x_num_expediente_($expediente['num_expediente'])==0)||($expediente['num_expediente']=="")){
       echo "entro valido expediente".$expediente['num_expediente'];
        if(listar_expedienteByPersonalAndMateria($expediente['id_usuario_servicio'],$expediente['materia'])==0)
        {   echo "entro valido personal materia";
            alta_expediente($expediente);
    
        $mensaje=['tipo'=>"exito",
                'mensaje'=>"registro existoso"];
        $dirigir="listar_Expediente";
        }
        else{
            $mensaje=['tipo'=>"error",
            'mensaje'=>"el usuario ya cuenta con un defensor del mismo problema"];
            $dirigir="asignar_defensor";
        }
    } */
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