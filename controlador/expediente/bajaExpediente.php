<?php 
   

   include_once('../../modelo/expediente.php');
   include '../../libreria/herramientas.php';
    $respuesta = Array(
        "id_expediente"     =>$_POST['id_expediente'],  
       "fecha_baja"         =>$_POST['fecha_baja'],
       "motivos"         =>$_POST['motivoBaja'],
       "estado"         =>"BAJA",
       "observaciones" =>$_POST['observacion']
       
   );

   

$respuesta =  array_map( "cadenaToMayuscula",$respuesta);/// convierte todo a mayusculas


   //$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
   //if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
    //print_r($respuesta);
      {
         // bajaExpediente($respuesta); se cambio por esto
         setBajaActivoExpediente($respuesta);
       $mensaje=['tipo'   =>"exito",
                 'mensaje'=>"Baja de expediente exitoso"];
        // echo "el registro es exitoso" ;  
   }
   //print_r($respuesta);

   
   echo json_encode($mensaje);
   if(isset($_GET['pertenece']))
      if($_GET['pertenece']=='admin')
      {
        $mensaje=['tipo'=>"exito",
                  'mensaje'=>"Baja exitoso"
                ];
        $dirigir="asignar_defensor";
        $_SESSION['mensaje'] = $mensaje;
        
      header("location: ../../vistas/administrador/index.php");
    } 
  else{
    echo json_encode($mensaje);
    }
?>