<?php 
    header('Content-Type: application/json');
    include '../../modelo/personal.php';    
    include '../../modelo/usuarioServicio.php';
    include '../../libreria/herramientas.php';
    include_once ('../../modelo/expediente.php');
    include_once ('../../modelo/defensor/defensor.php');
    include_once ('../../modelo/detalleExpediente_usuarioServicio.php');
   
    //$usuario_servicio=getUsuarioByCurp($_POST['curp'])[0]['id_usuario_servicio'];
//     $materia=listar_defensor_x_id($_POST['defensor'])[0]['materia'];
     $materia=listar_defensor_x_id($_POST['defensor']);
     //print_r($materia);
     $usuario=explode(",",$_POST['usuarios']  );
    $expediente = Array(
            "id_defensor"          =>$_POST['defensor'],
            "num_expediente"       =>((isset($_POST['expediente']))?$_POST['expediente']:""),
            "nombre_delito"        =>$_POST["delito"],
            "tipo_expediente"      =>$_POST["tipo_expediente"],
            "grado_delito"  =>$_POST["grado_delito"]           
        );
        
 $expediente =  array_map( "cadenaToMayuscula",$expediente);/// convierte todo a mayusculas
    //////// CUANDO ES EJECUCION DE SANCIONES SE DEBE DE REGISTRAR LA FECHA EN QUE SE CREO EL EXPEDIENTE
    $mensaje=['tipo'=>"error",
    'mensaje'=>"expediente ya existe"];
    $dirigir="asignar_defensor";
    if((listar_x_num_expediente_($expediente['num_expediente'])==0)||($expediente['num_expediente']=="")){
         //echo "validando   ".existenciaUsuario($usuario,$materia[0]['id_materia']);
        if(existenciaUsuario($usuario,$materia[0]['id_materia'])==false)
        {//   echo "entro valido personal materia";
            alta_expediente($expediente);
            foreach ($usuario as $key => $value) {
             alta_DetalleExpedinte(ultimoExpedinteCreatado(),$value);
             }
           
        $mensaje=['tipo'=>"exito",
                'mensaje'=>"registro existoso"];
        $dirigir="listar_Expediente";
        }
        else{
            $mensaje=['tipo'=>"error",
            'mensaje'=>" uno o varios usuarios ya cuenta con un defensor del mismo problema"];
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
       header("location: ../../vistas/defensor/index.php");
     }
     else{
          header('Content-Type: application/json');
         echo "json";
     }
    }
      
function existenciaUsuario($usuarios,$materia){
     foreach ($usuarios as $key => $value) {
         $existencia= listar_expedienteByPersonalAndMateria($value,$materia);
        // print_r($existencia);
       if($existencia>0)
          return true;

     }
     return false;

}
      
?>