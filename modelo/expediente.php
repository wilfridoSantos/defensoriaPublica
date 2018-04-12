<?php
require_once("conexion.php");

function listar_expediente_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
  
  function listar_expediente_asesoria($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join asesoria using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_visitas($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join visitas using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
    function listar_expediente_adudiencia($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join audiencia using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
  
    //Definimos la funciones sobre el objeto crear_expediente
    function crear_expediente($provedor){
        global $conexion;
        $sql = "INSERT INTO expediente ";
        $sql.= "SET fecha_inicia'".$provedor['fecha_inicio']."', estado='".$provedor['estado']."',  nombre_delito='".$provedor['nombre_delito']."'";

        return consulta($sql, $conexion);
    }
   


?>
