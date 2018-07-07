<?php

include_once('../../modelo/contraparte.php');
include '../../libreria/herramientas.php';

 $respuesta = Array(
           
    "id_contraparte"         =>$_POST['id_contraparte'],
    "nombre"           =>$_POST['nombre'],
    "apellido_paterno"       =>$_POST['apellido_paterno'],
    "apellido_materno"       =>$_POST['apellido_materno'],
    "etnia"       =>$_POST['etnia'],
    "idioma"       =>$_POST['idioma'],
    "telefono"       =>$_POST['telefono'],
    "genero"       =>$_POST['genero'],
    "discapacidad"       =>$_POST['discapacidad'],
    "email"  =>$_POST['email']
   
);


$respuesta =  array_map( "cadenaToMayuscula",$respuesta);/// convierte todo a mayusculas
//$verificarRegistro=existeRespuestaExpediente($_POST['id_expediente'],$_POST['id_pregunta']);
//if($verificarRegistro==0)// 0 INDICA QUE NO EXITE LA RESPUESTA A UNA PREGUNTA DE UN DICHO EXPEDIENTE
 //print_r($respuesta);
   {actualizar_Contraparte($respuesta);
    $mensaje=['tipo'   =>"exito",
              'mensaje'=>"Actualizacion exitoso"];
     // echo "el registro es exitoso" ;  
}
//print_r($respuesta);

echo json_encode($mensaje);
/* else 
echo "el registro ya existe";
 */

?>