<?php

include_once('../../modelo/usuarioServicio.php');

include '../../libreria/herramientas.php';


 $respuesta = Array(
           
    "id_usuario_servicio"         =>$_POST['id_usuario_servicio'],
    "nombre"                 =>$_POST['nombre'],
    "apellido_paterno"       =>$_POST['apellido_paterno'],
    "apellido_materno"       =>$_POST['apellido_materno'],
    "etnia"                  =>$_POST['etnia'],
    "idioma"                 =>$_POST['idioma'],
    "telefono"               =>$_POST['telefono'],
    "genero"                 =>$_POST['genero'],
    "discapacidad"          =>$_POST['discapacidad'],
    "calle"                   =>$_POST['calle'],
    "etnia"                   =>$_POST['etnia'],
    "municipio"                   =>$_POST['municipio'],
    "colonia"                   =>$_POST['colonia'],
    "email"                   =>$_POST['email'],
    "numero"                   =>$_POST['numero']
    
);
$respuesta =  array_map( "cadenaToMayuscula",$respuesta);/// convierte todo a mayusculas
 
   {actualizar_usuario_servicio($respuesta);
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