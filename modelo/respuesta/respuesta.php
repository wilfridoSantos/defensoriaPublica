<?php

include_once('../../libreria/conexion.php');

     

    //Definimos la funciones sobre el objeto crear_asesoria
    function RegistrarRespuesta($respuesta){
        $sql = "INSERT INTO respuesta ";
        $sql.= "SET id_pregunta_materia='".$respuesta['id_pregunta_materia']."',";
        $sql.= " id_expediente='".$respuesta['id_expediente']."',   respuesta='".$respuesta['respuesta']."',";
        $sql.= " observaciones='".$respuesta['observaciones']."',   accion_implementar='".$respuesta['accion_implementar']."'";
        //echo $sql;
     $lista=registro($sql);
     return $lista;
    }


    function existeRespuestaExpediente($id_expediente,$id_pregunta){
        $sql="select * from respuesta where id_pregunta_materia=".$id_pregunta." and id_expediente=".$id_expediente;			
     //  echo $sql;
   $lista=consulta($sql);
  // print_r($lista);
             return $lista;
}


function respuestaPregunta($id_expediente){
    $sql="select * from respuesta 
            INNER JOIN pregunta_materia using(id_pregunta_materia)
            INNER JOIN pregunta using(id_pregunta)
            where id_expediente=".$id_expediente;			
  //  echo $sql;
    $lista=consulta($sql);
//print_r($lista);
         return $lista;
}
//UPDATE  respuesta  SET respuesta='2018-06-20', observaciones='se tomara encuenta al reclusorio',accion_implementar='se tomara las declaraciones de la victima'
//where id_respuesta
function actualizarRespuestaPregunta($respuesta){
    $sql = "UPDATE respuesta ";
    $sql.= "SET respuesta='".$respuesta['respuesta']."',";
    $sql.= " observaciones='".$respuesta['observaciones']."',";
    $sql.= " accion_implementar='".$respuesta['accion_implementar']."'";
    $sql.= " where id_respuesta='".$respuesta['id_respuesta']."'";
   // echo $sql;
 $lista=registro($sql);
 return $lista;
}



?>
