<?php 
    header('Content-Type: application/json');
    include '../../modelo/personal.php';    
    include '../../modelo/usuarioServicio.php';
    include '../../libreria/herramientas.php';
    include_once ('../../modelo/expediente.php');
   
    $usuario_servicio=getUsuarioByCurp($_POST['curp'])[0]['id_usuario_servicio'];

    $expediente = Array(
           
            "id_defensor"         =>$_POST['defensor'],
            "id_usuario_servicio"     =>$usuario_servicio,
            "materia"     =>$_POST['materia']
           
        );

        print_r($expediente);
        //print_r($usuario_servicio);

       /*  $usuario =  array_map( "cadenaToMayuscula",$usuario);
        $mensaje=['tipo'=>"error",
        'mensaje'=>"este usuario ya se encuentra registrado"];
      
       //sprint_r (getDefensorByCurp($_POST['curp']));
        if(getUsuarioByCurp($_POST['curp'])==0){
            crear_usuarioSevicio($usuario); //regresa 1 si regristro para validar tambien par validar si ya exite o res regisro correctamente
              $mensaje=['tipo'=>"exito",
        'mensaje'=>"registro existoso"];
      
        } 
     //print_r($usuario);
 */

alta_expediente($expediente);
$mensaje=['tipo'=>"exito",
'mensaje'=>"registro existoso"];
if(isset($_GET['tipo'])){
        
    if($_GET['tipo']=="html"){
         
        session_start();
        // $_SESSION['mensaje'] = "registro exitoso";
         $_SESSION['mensaje'] = $mensaje;
    
       // header("location: ../../vistas/administrador/index.php?dirigir=cambioAdscripcion");
     }
     else{
          header('Content-Type: application/json');
         echo "json";
     }
    }
      
     
      
?>