<?php 
   

   include_once('../../modelo/expediente.php');
     $respuesta = Array(
        "id_expediente"     =>$_GET['id_expediente'],  
       "fecha_baja"         =>"",
       "motivos"             =>"",
       "estado"             =>"PROCESO",
       "observaciones"      =>""
       
   );


   //$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
   //if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
    //print_r($respuesta);
      {setBajaActivoExpediente($respuesta);
       $mensaje=['tipo'   =>"exito",
                 'mensaje'=>"Activacion de expediente exitoso"];
        // echo "el registro es exitoso" ;  
   }
   //print_r($respuesta);

   
   echo json_encode($mensaje);

?>