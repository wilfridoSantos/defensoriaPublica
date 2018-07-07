<?php

include_once('../../modelo/expediente.php');



 $respuesta = Array(
     "id_expediente"     =>$_POST['id_expediente'],  
    "fecha_final"         =>$_POST['fecha_final'],
    "observaciones"           =>$_POST['observacion']
    
);
//$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
//if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
 //print_r($respuesta);
   {finalizarExpediente($respuesta);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"finalizacion exitoso"];
     // echo "el registro es exitoso" ;  
}
//print_r($respuesta);

echo json_encode($mensaje);
/* else 
echo "el registro ya existe";
 */

?>