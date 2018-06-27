<?php

include_once('../../modelo/respuesta/respuesta.php');


/* echo "respuesta<br>";
echo $_POST['respuesta'];
echo "observacion<br>";
echo $_POST['observacion'];
echo "accion a implementar<br>";
echo $_POST['accion_implementar'];
echo "id_pregunta<br>";
echo $_POST['id_pregunta'];

 */$respuesta = Array(
           
    "id_pregunta_materia"         =>$_POST['id_pregunta'],
    "id_expediente"       =>$_POST['id_expediente'],
    "respuesta"           =>$_POST['respuesta'],
    "observaciones"       =>$_POST['observacion'],
    "accion_implementar"  =>$_POST['accion_implementar']
   
);
$mensaje=['tipo'   =>"error",
              'mensaje'=>"Esta pregunta ya se encuentra registrada"];
$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
   {RegistrarRespuesta($respuesta);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"Registro exitoso"];
   //   echo "el registro es exitoso" ;  
}//else 
//echo "el registro ya existe";
echo json_encode($mensaje);

?>