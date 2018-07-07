<?php

include_once('../../modelo/respuesta/respuesta.php');


include '../../libreria/herramientas.php';

 $respuesta = Array(
           
    "id_respuesta"         =>$_POST['id_respuesta'],
    "respuesta"           =>$_POST['respuesta'],
    "observaciones"       =>$_POST['observacion'],
    "accion_implementar"  =>$_POST['accion_implementar']
   
);
//$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
//if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
 //print_r($respuesta);
 
 $respuesta =  array_map( "cadenaToMayuscula",$respuesta);/// convierte todo a mayusculas
   {actualizarRespuestaPregunta($respuesta);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"Actualizacion exitoso"];
     // echo "el registro es exitoso" ;  
}
echo json_encode($mensaje);
/* else 
echo "el registro ya existe";
 */

?>