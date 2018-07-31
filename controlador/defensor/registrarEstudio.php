<?php

include_once('../../modelo/defensor/defensor.php');
include '../../libreria/herramientas.php';

 $respuesta = Array(
           
    "id_personal"           =>$_POST['id_personal'],
    "perfil"                =>$_POST['perfil'],
    "grado_escolaridad"     =>$_POST['grado_escolaridad'],
    "fecha_termino"         =>$_POST['fecha_termino'],
    "instituto"             =>$_POST['instituto'],
   // "documento_provatorio"  =>$_POST['documento_provatorio'],
    "nombre_estudio"        =>"",
    "descripcion_perfil_egreso" =>$_POST['descripcion_perfil_egreso'],
    "cedula_profesional"     =>"",
    "especialidad"          =>$_POST['especialidad']
   
);


$respuesta =  array_map( "cadenaToMayuscula",$respuesta);/// convierte todo a mayusculas

$nombreArchivo="";
// echo "Error: " . $_FILES['archivo']['error'] ;
 //echo "comprabante es =>".$_FILES["archivo"]["name"];
 if(isset($_FILES['documento_provatorio']))   
     if ($_FILES['documento_provatorio']["error"] > 0)
     {
    // echo "Error: " . $_FILES['archivo']['error'] . "<br>";
     $mensaje=['tipo'=>"error",
     'mensaje'=>$_FILES['documento_provatorio']['error']];
     $dirigir="registrar_actividad";
 
     }
     if($_FILES['documento_provatorio']['size'] != 0){
         $nombreArchivo = $_FILES["documento_provatorio"]["name"];
         $rutaFoto   = $_FILES["documento_provatorio"]["tmp_name"];
         $carpeta='../../recursos/archivo/documentoProvatorio/';
         
         if (!file_exists($carpeta)) {
                 mkdir($carpeta, 0777, true);
         }
         
         $destino = $carpeta.basename($nombreArchivo);
         move_uploaded_file($rutaFoto,$destino);
     }

     $respuesta['documento_provatorio']=$nombreArchivo;
   {registrarEstudio($respuesta);
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