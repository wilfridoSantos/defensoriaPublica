<?php
require_once("conexion.php");

function listar_asesoria_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }


    //Definimos la funciones sobre el objeto crear_asesoria
    function crear_asesoria($asesoria){
        global $conexion;
        $sql = "INSERT INTO asesoria ";
        $sql.= "SET id_expediente='".$asesoria['id_expediente']."',   fecha_asesoria='".$asesoria['fecha_asesoria']."',";
     $sql.= "observaciones='".$asesoria['observaciones']."'";

        return consulta($sql, $conexion);
    }






?>
