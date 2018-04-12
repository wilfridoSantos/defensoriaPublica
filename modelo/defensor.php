<?php
require_once("conexion.php");

function listar_defensor_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }

  
    //Definimos la funciones sobre el objeto crear_defensor
    function crear_defensor($provedor){
        global $conexion;
        $sql = "INSERT INTO proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";

        return consulta($sql, $conexion);
    }
    //Definimos una funcion que acutualice al actualiza_defensor
    function actualiza_defensor($clientes){
        global $conexion;
        $sql = "UPDATE  proveedor ";
        $sql.= "SET id_juzgado='".$provedor['id_juzgado']."',   id_estudio='".$provedor['id_estudio']."',";
        $sql.= "numero_cedula_profesional='".$provedor['numero_cedula_profesional']."'";
        return consulta($sql, $conexion);
    }

 



?>
