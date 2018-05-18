<?php 
    header('Content-Type: application/json');
    include '../../modelo/personal.php';    
    include '../../modelo/usuarioServicio.php';
    include '../../libreria/herramientas.php';
    include_once ('../../modelo/expediente.php');
   
    $usuario_servicio=getUsuarioByCurp($_POST['curp'])[0]['id_usuario_servicio'];

    $expediente = Array(
           
            "id_defensor"          =>$_POST['defensor'],
            "num_expediente"       =>((isset($_POST['expediente']))?$_POST['expediente']:""),
            "id_usuario_servicio"  =>$usuario_servicio,
            "materia"              =>$_POST['materia']
           
        );

      // print_r($expediente);
    //////// CUANDO ES EJECUCION DE SANCIONES SE DEBE DE REGISTRAR LA FECHA EN QUE SE CREO EL EXPEDIENTE
    $mensaje=['tipo'=>"error",
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
    }



if(isset($_GET['tipo'])){
        
    if($_GET['tipo']=="html"){

        session_start();
        // $_SESSION['mensaje'] = "registro exitoso";
         $_SESSION['mensaje'] = $mensaje;
         $_SESSION['dirigir'] = $dirigir;
        // echo $mensaje['mensaje'];
       header("location: ../../vistas/coordinador/index.php");
     }
     else{
          header('Content-Type: application/json');
         echo "json";
     }
    }
      
     
      
?>