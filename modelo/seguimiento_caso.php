<?php
require_once("conexion.php");

function listar_siguimiento_x_id($id){
      global $conexion;
      $sql = "select * from defensor where id='".$id."'";
      $consulta = consulta($sql, $conexion);
      return $consulta;
  }
  
  function listar_siguimiento_x_expediente($id_expediente){
        global $conexion;
        $sql = "select * from expediente inner join compra_proveedor using(id_expediente) inner join asesoria using(id_expediente) where nombre='".$id_expediente."'";
        $consulta = consulta($sql, $conexion);
        return $consulta;
    }
   
  

    function crear_siguimiento_caso($clientes){
        global $conexion;
        $sql = "UPDATE  expediente ";
        $sql.= "SET id_personal='".$provedor['id_personal']."',   id_expediente='".$provedor['id_expediente']."',";
        $sql.= "id_defensor='".$provedor['id_defensor']."'";
        return consulta($sql, $conexion);
    }


?>
