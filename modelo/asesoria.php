<?php

include_once('../../libreria/conexion.php');

function listar_asesoria_x_id($id){
      global $conexion;
      $sql = "select * from asesoria where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_asesoria($asesoria){
        $sql = "INSERT INTO asesoria ";
        $sql.= "SET id_actividad='".$asesoria['id_actividad']."',";
        $sql.= " latitud='".$asesoria['latitud']."',   longitud='".$asesoria['longitud']."'";
        echo $sql;
     $lista=registro($sql);
     return $lista;
    }






?>
