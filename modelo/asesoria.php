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
        $sql = "INSERT INTO proveedor ";
        $sql.= "SET id_expediente='".$provedor['id_expediente']."',   fecha_asesoria='".$provedor['fecha_asesoria']."',";
        $sql.= "observaciones='".$provedor['observaciones']."'";

        return consulta($sql, $conexion);
    }
   

 



?>
