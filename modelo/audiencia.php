<?php

include_once('../../libreria/conexion.php');

function listar_audiencia_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_audiencia($asesoria){
        $sql = "INSERT INTO audiencias ";
        $sql.= "SET id_actividad='".$asesoria['id_actividad']."',";
        $sql.= " latitud='".$asesoria['latitud']."',   longitud='".$asesoria['longitud']."'";
        echo $sql;
     $lista=registro($sql);
     return $lista;
    }






?>
