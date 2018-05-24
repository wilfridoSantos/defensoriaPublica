<?php

include_once('../../libreria/conexion.php');

function listar_visitas_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    //Definimos la funciones sobre el objeto crear_visitas
    function crear_visita($asesoria){
        $sql = "INSERT INTO visitas_carcelarias ";
        $sql.= "SET id_actividad='".$asesoria['id_actividad']."',   foto='".$asesoria['foto']."'";
 //       $sql.= " latitud='".$asesoria['latitud']."',   longitud='".$asesoria['longitud']."'";
        echo $sql;
     $lista=registro($sql);
     return $lista;
    }






?>
